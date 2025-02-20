<?php

namespace App\Livewire\Scores;

use App\Models\Academic;
use App\Models\Scores as ModelsScores;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

/**
 * Livewire Scores Create Component
 *
 * @author <Abdul Saboor Hamedi>
 *
 * @version 1.0.1
 *
 * @description Only teachers are allowed to create scores. By no means this code is perfect, it's just a starting point
 */
class CreateScore extends Component
{
    #[Lazy]

    #[Layout('layouts.app')]
    public $assignment = '';

    public $formative = '';

    public $midterm = '';

    public $final = '';

    public $average = '';

    public $report = '';

    public $academic_year_id = '';

    public $academic_years = [];

    public $grades = [];

    public string $search = '';

    public $students = [];

    const CACHE_KEY = 'scores';

    protected $listeners = ['refresh_academic_year' => 'loadAcademicYears'];

    public function mount()
    {

        $this->loadAcademicYears();
        $this->searchStudents();

    }

    public function loadAcademicYears(): void
    {

        $this->academic_years = Academic::orderByDesc('year')
            ->pluck('year', 'id');

    }

    public function forgetCatches()
    {

        Cache::forget($this->getCacheKey());

    }

    public function getCacheKey()
    {

        return self::CACHE_KEY.'_'.Auth::id();

    }

    public function searchStudents()
    {
        $this->students = Student::pluck('lastname', 'id');
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
            $this->forgetCatches();

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
        return view('livewire.scores.create-score');
    }
}
