<?php

namespace App\Livewire\Scores;

use App\Models\Academics;
use App\Models\Scores as ModelsScores;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Lazy]
    // layout
    #[Layout('layouts.app')]
    #[Validate('required|numeric|max:100')]
    public $assignment = '';

    #[Validate('required|numeric|max:100')]
    public $formative = '';

    #[Validate('required|numeric|max:100')]
    public $midterm = '';

    #[Validate('nullable|numeric|max:100')]
    public $final = '';

    #[Validate('nullable|numeric')]
    public $average = '';

    #[Validate('nullable|max:255')]
    public $report = '';

    #[Validate('required')]
    public $academic_year_id = '';

    public $academic_years = [];

    protected $listeners = ['refresh_academic_year' => 'academicYear'];

    public function mount()
    {
        // if (!Auth::user()->hasRole(['admin', 'teacher'])) {
        //     return redirect()->route('dashboard');  // Redirect to home if not manager
        // }
        $this->academicYear();
    }

    public function academicYear()
    {
        $this->academic_years = Academics::where('year', '>', '2010')->latest()->get();
    }

    public function save()
    {

        $this->validate();

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

        $this->reset();
        session()->flash('success', 'Scores saved successfully');
        $this->dispatch('refresh_academic_year');
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
