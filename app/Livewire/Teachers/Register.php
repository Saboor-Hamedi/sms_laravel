<?php

namespace App\Livewire\Teachers;

use Livewire\Component;
use Livewire\Attributes\Lazy;

class Register extends Component
{
    #[Lazy]
    public function render()
    {
        return view('livewire.teachers.register');
    }
}
