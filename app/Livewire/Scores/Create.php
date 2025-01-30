<?php

namespace App\Livewire\Scores;

use App\Models\Academics;
use App\Models\Scores as ModelsScores;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class Create extends Component
{
    #[Layout('layouts.app')]
    #[Lazy]
    public $assignment = '';

    public $formative = '';

    public $midterm = '';

    public $final = '';

    public $average = '';

    public $report = '';

    public $academic_year_id = '';

    public $academic_years = [];

    protected $listeners = ['refresh_academic_year' => 'loadAcademicYears'];

    public function mount()
    {
        $this->loadAcademicYears();
    }

    public function loadAcademicYears(): void
    {
        $this->academic_years = Academics::orderByDesc('year')
            ->pluck('year', 'id');
    }

    public function save()
    {
        $this->validate($this->rules());
        try {
            ModelsScores::create([
                'user_id' => Auth::user()->id,
                'assignment' => $this->assignment,
                'formative' => $this->formative,
                'midterm' => $this->midterm,
                'final' => $this->final,
                'average' => $this->average,
                'report' => $this->report,
                'academic_year_id' => $this->academic_year_id,
            ]);

            session()->flash('status', ['type' => 'success', 'message' => 'Scores saved successfully']);

            $this->reset();
            $this->dispatch('refresh_academic_year');

        } catch (Exception $e) {

            session()->flash('error', 'Error saving scores'.$e->getMessage());

        }
    }

    public function rules()
    {
        return [
            'assignment' => ['required', 'numeric', 'max:100'],
            'formative' => ['required', 'numeric', 'max:100'],
            'midterm' => ['required', 'numeric', 'max:100'],
            'final' => ['nullable', 'numeric', 'max:100'],
            'average' => ['nullable', 'numeric'],
            'report' => ['nullable', 'max:255'],
            'academic_year_id' => ['required'],
        ];
    }

    public function cancel()
    {
        $this->reset();

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.scores.create');
    }
}
