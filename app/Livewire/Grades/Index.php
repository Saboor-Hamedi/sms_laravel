<?php

namespace App\Livewire\Grades;

use App\Models\Grade;
use App\Models\Teacher;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        $grades = Grade::with(['teacher', 'students'])->latest()->paginate(10);
        return view('livewire.grades.index', ['grades' => $grades]);
    }
}
