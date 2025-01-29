<?php

namespace App\Livewire\Grades;

use App\Models\Grade;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.app')]
    #[Lazy]
    public function render()
    {
        $grades = Grade::with(['teacher', 'students', 'academic'])->latest()->paginate(10);

        return view('livewire.grades.index', ['grades' => $grades]);
    }
}
