<?php

namespace App\Livewire\Grades;

use App\Models\Grade;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Lazy;

class Index extends Component
{
    #[Lazy]
    #[Layout('layouts.app')]
    public function render()
    {
        $grades = Grade::with(['teacher', 'students', 'academic'])->latest()->paginate(10);
        return view('livewire.grades.index', ['grades' => $grades]);
    }
}
