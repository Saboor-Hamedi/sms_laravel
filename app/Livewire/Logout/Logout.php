<?php

namespace App\Livewire\Logout;

use App\Livewire\Actions\Logout as ActionsLogout;
use Livewire\Component;
use Livewire\Attributes\Lazy;

class Logout extends Component
{
    #[Lazy]
    public function logout(ActionsLogout $logout): void
    {
        $logout();

        $this->redirect('/login', navigate: true);
    }


    public function render()
    {
        return view('livewire.logout.logout');
    }
}
