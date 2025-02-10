<?php

namespace App\Livewire\Scores;

use App\Models\Scores as ModelsScores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditScore extends Component
{
    #[Lazy]
    #[Validate('required|numeric|max:100')]
    public $assignment = '';

    #[Validate('required|numeric|max:100')]
    public $formative = '';

    #[Validate('required|numeric|max:100')]
    public $midterm = '';

    #[Validate('required|numeric|max:100')]
    public $final = '';

    #[Validate('nullable|numeric')]
    public $average = '';

    #[Validate('nullable|max:255')]
    public $report = '';

    public $scoreId;

    const CACHE_KEY = 'scores';

    #[Layout('layouts.app')]
    public function mount(int $id)
    {
        $this->update($id);
    }

    public function update($id)
    {
        $score = ModelsScores::findOrFail($id);
        $this->scoreId = $score->id;
        $this->assignment = $score->assignment;
        $this->formative = $score->formative;
        $this->midterm = $score->midterm;
        $this->final = $score->final;
        $this->average = $score->average;
        $this->report = $score->report;
    }

    public function edit()
    {
        $this->validate();
        $score = ModelsScores::findOrFail($this->scoreId);
        $score->update([
            'assignment' => $this->assignment,
            'formative' => $this->formative,
            'midterm' => $this->midterm,
            'final' => $this->final,
            'average' => $this->average,
            'report' => $this->report,

        ]);
        session()->flash('success', 'Score updated successfully.');
        $this->forgetCatches();

        return redirect(route('dashboard'));
    }

    public function forgetCatches()
    {
        Cache::forget($this->getCacheKey());
    }

    public function getCacheKey()
    {
        return self::CACHE_KEY.'_'.Auth::id();
    }

    public function cancel()
    {
        return redirect(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.scores.edit-score');
    }
}
