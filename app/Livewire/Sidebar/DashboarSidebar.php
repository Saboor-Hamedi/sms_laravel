<?php

namespace App\Livewire\Sidebar;

use Livewire\Component;
use Livewire\Attributes\Lazy;

class DashboarSidebar extends Component
{
    #[Lazy]
    public function render()
    {
        return view('livewire.sidebar.dashboard-sidebar');
    }
}
