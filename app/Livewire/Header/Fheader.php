<?php

namespace App\Livewire\Header;

use Livewire\Component;
use Livewire\Attributes\Lazy;

class Fheader extends Component
{
    #[Lazy]
    public function render()
    {
        return view('livewire.header.fheader');
    }
}
