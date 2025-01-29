<?php

namespace App\Livewire\Header;

use Livewire\Attributes\Lazy;
use Livewire\Component;

class Header extends Component
{
    #[Lazy]
    public function render()
    {
        return view('livewire.header.header');
    }
}
