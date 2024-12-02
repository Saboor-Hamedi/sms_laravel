<?php

namespace App\Livewire\UserProfile;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.user-profile.index');
    }
}
