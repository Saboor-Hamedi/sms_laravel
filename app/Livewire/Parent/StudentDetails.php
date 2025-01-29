<?php

namespace App\Livewire\Parent;

use App\Models\Student;
use Livewire\Attributes\Layout;
use livewire\Attributes\Lazy;
use Livewire\Component;

class StudentDetails extends Component
{
    public $studentId;

    public $student;

    #[Lazy]

    #[Layout('layouts.app')]
    public function mount($id)
    {
        $this->studentId = $id;
        $this->student = Student::with('user')->findOrFail($this->studentId);
    }

    public function render()
    {
        return view('livewire.parent.student-details', ['student' => $this->student]);
    }
}
