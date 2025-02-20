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

    public $search = '';

    public $students = [];

    public $loading = false;

    public $ignoreSearchUpdate = false;

    public $selectedStudentId = null;

    public $studentSelected = false;


    const CACHE_KEY = 'scores';

    protected $listeners = ['refresh_academic_year' => 'loadAcademicYears'];

    public function mount()
    {

        $this->loadAcademicYears();

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

        if (strlen($this->search) < 2) {
            $this->students = [];

            return;
        }
        $this->loading = true;

        usleep(100000);
        $this->students = Student::where('lastname', 'like', '%'.$this->search.'%')
            ->orderBy('lastname')
            ->limit(5)
            ->pluck('lastname', 'id')
            ->toArray();

        $this->loading = false;

    }

    public function updatedSearch()
    {
        if ($this->ignoreSearchUpdate) {
            $this->ignoreSearchUpdate = false;

            return;
        }

        $this->studentSelected = false;
        $this->selectedStudentId = null;
        $this->searchStudents();

    }

    public function selectStudent($id)
    {
        if ($student = Student::find($id)) {
            $this->ignoreSearchUpdate = true;
            $this->search = $student->lastname;
            $this->selectedStudentId = $student->id;
            $this->students = [];
            $this->studentSelected = true;
        }
    }

    public function save()
    {
        $this->validate($this->rules());

        try {
            ModelsScores::create([
                'user_id' => Auth::user()->id,
                'student_id' => $this->selectedStudentId,
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
            'selectedStudentId' => ['required', 'exists:students,id'], // Validate Student ID

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
