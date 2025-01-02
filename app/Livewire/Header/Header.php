<?php

namespace App\Livewire\Header;

use Livewire\Component;
use Livewire\Attributes\Lazy;

class Header extends Component
{
    #[Lazy]
    public function render()
    {
        return view('livewire.header.header');
    }
}
