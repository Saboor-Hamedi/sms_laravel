<?php

namespace App\Livewire\Sidebar;

use Livewire\Attributes\Lazy;
use Livewire\Component;

class Sidebar extends Component
{
    #[Lazy]
    public function render()
    {
        return view('livewire.sidebar.sidebar');
    }
}
