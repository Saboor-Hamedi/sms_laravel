<?php

namespace App\Livewire\Grades;

use App\Models\Academics;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

/*
 * @author  <Saboor-Hamedi> 
 * @package App\Livewire\Grades
 * @version 1.0.0
 * @since   December 16, 2024
 * @link    https://github.com/Saboor-Hamedi/sms_laravel.git (fetch)
 TODO: 
    - This class for create new grade/class, 
    - At the moment, this class is accessible only by the admin.
    - this class will be used in the future for the admin to create new grade/class.
    - By no means this class is complete, it is just a starting point.
    - This class will be updated as the project progresses.
 */

class Create extends Component
{
    #[Layout('layouts.app')]

    public $students = [];

    public $subjects = [];

    public $academics = [];
    public $roles = [];

    // validations

    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $student_name = '';

    #[Validate('required')]
    public $academic_id = '';

    protected $listeners = ['refresh_academic_year', 'fetchAcademicYear'];
    public function mount()
    {
        $this->run();
    }
    public function run()
    {
        $this->fetchSubjects();
        $this->fetchStudents();
        $this->fetchAcademicYear();
    }
    public function fetchSubjects()
    {
        $this->subjects = Subject::pluck('name', 'id');
    }

    public function fetchStudents()
    {
        $this->roles = User::role('student')->pluck('name', 'id');
    }
    public function fetchAcademicYear()
    {
        $this->academics  = Academics::pluck('year', 'id');
    }
    public function save()
    {
        $this->validate();
        $grade = new Grade;
        $grade->teacher_id = Auth::id();
        $grade->subject_name = $this->name;
        $grade->academic_id = $this->academic_id;
        $grade->save();
        $grade->students()->attach($this->student_name);
        $this->reset();
        session()->flash('success', 'Grade created successfully');
        $this->dispatch('refresh_academic_year');
    }
    public function cancel()
    {
        return redirect()->route('dashboard');
    }
    public function render()
    {
        return view(
            'livewire.grades.create',
            [
                'subjects' => $this->subjects,
                'roles' => $this->roles,
                'academics' => $this->academics,
            ]
        );
    }
}
