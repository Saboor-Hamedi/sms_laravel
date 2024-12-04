<?php

namespace App\Livewire\Students;

use Livewire\Attributes\Layout;

use Livewire\Component;

class Create extends Component
{

    #[Layout('layouts.app')]

    public function save() {}

    public function delete() {}


    public function render()
    {
        return view('livewire.students.create');
    }
}
