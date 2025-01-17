<?php

namespace App\Livewire\Grades;

use App\Models\Academics;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Lazy;
/*
 * @author  <Abudul Saboor Hamedi>
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
    #[Lazy]
    #[Layout('layouts.app')]

    public $students = [];
    public $subjects = [];
    public $academics = [];
    public $teachers = [];
    public $roles = [];

    public $subject_name = '';
    public $student_name = '';
    public $academic_id = '';
    public $teacher_id = '';
    public $grade_id = '';


    protected $listeners = ['refresh_academic_year', 'fetchAcademicYear'];
    /**
     * Mount the component.
     *
     * This function is called when the component is mounted.
     * It calls the initializeData function which initializes the data for the component.
     */
    public function mount()
    {
        $this->initializeData();
    }
    /**
     * This function is used to initialize the data for the livewire component.
     * It calls the following functions and assigns them to the public properties of the component:
     * - fetchSubjects
     * - fetchStudents
     * - fetchAcademicYear
     */

    public function initializeData()
    {
        $this->subjects = $this->fetchSubjects();
        $this->roles = $this->fetchStudents();
        $this->academics = $this->fetchAcademicYear();
        $this->teachers = $this->fetchTeachers();
    }
    /**
     * Fetch all subjects from the database and return them as a collection.
     *
     * The collection contains the name and id of each subject.
     * The name is the value and the id is the key.
     *
     * @return \Illuminate\Support\Collection
     * @author  <Abudul Saboor Hamedi>
     */
    public function fetchSubjects()
    {
        return Subject::pluck('name', 'id');
    }

    /**
     * Fetch all students from the database and return them as a collection.
     *
     * The collection contains the name and id of each student.
     * The name is the value and the id is the key.
     *
     * @return \Illuminate\Support\Collection
     * @author  <Abudul Saboor Hamedi>
     */
    public function fetchStudents()
    {
        return Student::pluck('lastname', 'id');
    }
    /**
     * Summary of fetchAcademicYear
     * @return \Illuminate\Support\Collection
     * fetch academic year from the database and return it as a collection
     * pluck year and id from the collection and return it.
     * @author  <Abudul Saboor Hamedi>
     */
    public function fetchAcademicYear()
    {
        return Academics::orderBy('year', 'desc')->pluck('year', 'id');
    }
    public function fetchTeachers()
    {
        return Teacher::pluck('lastname', 'id');
    }
    /**
     * Summary of save
     * @return void
     * @author  <Abudul Saboor Hamedi>
     * $grade->students()->attach($this->student_name); // insert on grade_student pivot table
     * $this->resetForm(); // reset form after submit
     * session()->flash('success', 'Grade created successfully'); // flash message
     * $this->dispatch('refresh_academic_year'); // refresh academic year dropdown
     */
    public function save()
    {
        $this->validate([
            'teacher_id' => 'required',
            'subject_name' => 'required',
            'student_name' => 'required',
            'academic_id' => 'required',
        ]);
        $grade = Grade::create([
            'teacher_id' => $this->teacher_id,
            'subject_name' => $this->subject_name,
            'academic_id' => $this->academic_id,
        ]);
        $grade->students()->attach($this->student_name);

        $this->resetForm();
        session()->flash('success', 'Grade created successfully');
        $this->dispatch('refresh_academic_year');
    }


    /**
     * Resets the form fields to their default values.
     *
     * This method is called after submitting the form.
     *
     * @return void
     * @author  <Abudul Saboor Hamedi>
     */
    public function resetForm()
    {
        $this->subject_name = '';
        $this->student_name = '';
        $this->academic_id = '';
    }
    public function cancel()
    {
        /**
         * Redirects the user to the dashboard.
         *
         * This method is called when the user clicks the cancel button.
         *
         * @return \Illuminate\Http\RedirectResponse
         * @author  <Abudul Saboor Hamedi>
         */
        return redirect()->route('dashboard');
    }
    public function render()
    {
        /**
         * Renders the Livewire component for creating a new grade.
         *
         * The component displays a form with select fields for the subject and academic year,
         * and a multiple select field for the students.
         *
         * @return \Illuminate\Contracts\View\View The rendered Livewire component.
         * @author  <Abudul Saboor Hamedi>
         */
        return view(
            'livewire.grades.create',
            [
                'subjects' => $this->subjects,
                'roles' => $this->roles,
                'academics' => $this->academics,
                'teachers' => $this->teachers,
            ]
        );
    }
}
