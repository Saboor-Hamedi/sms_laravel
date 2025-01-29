<?php

namespace App\Livewire\Sidebar;

use Livewire\Attributes\Lazy;
use Livewire\Component;

class DashboarSidebar extends Component
{
    #[Lazy]
    public function render()
    {
        return view('livewire.sidebar.dashboard-sidebar');
    }
}
