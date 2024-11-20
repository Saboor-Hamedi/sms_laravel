<?php

namespace App\Livewire\Logout;

use App\Livewire\Actions\Logout as ActionsLogout;
use Livewire\Component;

class Logout extends Component
{
    public function logout(ActionsLogout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
    public function render()
    {
        return view('livewire.logout.logout');
    }
}
