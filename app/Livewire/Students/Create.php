<?php

namespace App\Livewire\Students;

use Livewire\Attributes\Layout;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    #[Layout('layouts.app')]

    #[Validate('required|alpha|min:2|max:50')]
    public $lastname = '';
    #[Validate('required|alpha|min:2|max:50')]
    public $country = '';
    #[Validate('required|min:2|max:50')]
    public $state = '';
    #[Validate('required|min:2|max:100')]
    public $address = '';

    public function save()
    {
        $this->validate();
    }

    public function delete() {}


    public function render()
    {
        return view('livewire.students.create');
    }
}
