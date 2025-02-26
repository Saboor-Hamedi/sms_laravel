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
        $this->students = Student::query()
            ->where('lastname', 'like', '%'.$this->search.'%')
            ->orWhere('id', $this->search)
            ->orderBy('lastname')
            ->limit(5)
            ->get()
            ->mapWithKeys(function ($student) {
                return [$student->id => $student->lastname];
            })
            ->toArray();

        $this->loading = false;
    }

    public function setStudentIdFromSearch()
    {
        if (empty($this->search)) {
            return;
        }

        $student = Student::find($this->search);

        if ($student) {
            $this->selectStudent($student->id);
        } else {
            session()->flash('status',
                ['type' => 'error', 'message' => 'Student ID not found']);

            $this->handleEscape();
        }
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

    public function handleEscape()
    {
        $this->search = '';
        $this->students = [];
        $this->studentSelected = false;
        $this->selectedStudentId = null;
    }

    public function handleEscapeAndCloseResult()
    {
        $this->handleEscape();
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
            'selectedStudentId' => ['required', 'exists:students,id'],
            'assignment' => ['required', 'numeric', 'between:0,999.99'], // Allows decimals up to 2 places
            'formative' => ['required', 'numeric', 'between:0,999.99'],
            'midterm' => ['required', 'numeric', 'between:0,999.99'],
            'final' => ['nullable', 'numeric', 'between:0,999.99'],
            'average' => ['nullable', 'numeric', 'between:0,999.99'],
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
