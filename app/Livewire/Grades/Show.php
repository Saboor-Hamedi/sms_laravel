<?php

namespace App\Livewire\Grades;

use Livewire\Attributes\Lazy;
use Livewire\Component;

class Show extends Component
{
    #[Lazy]
    public function render()
    {
        return view('livewire.grades.show');
    }
}
