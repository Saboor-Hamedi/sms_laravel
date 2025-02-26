<?php

namespace App\Livewire\Login;

use Livewire\Component;

class Login extends Component
{
    public function login(){
        dd('Hello world');
    }
    public function render()
    {
        return view('livewire.login.login');
    }
}
