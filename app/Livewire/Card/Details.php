<?php

namespace App\Livewire\Card;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class Details extends Component
{
    public $userCount = 0;

    const CACHE_KEY = 'userCount';

    const CACHE_TIME = 10;

    // #[Lazy]

    public function mount()
    {
        $this->userLists();
    }

    public function userLists()
    {
        // $this->userCount = User::countUsers();
        $this->userCount = Cache::remember(self::CACHE_KEY, self::CACHE_TIME, function () {
            return User::countUsers();
        });
    }

    public function render()
    {
        return view('livewire.card.details', ['userCount' => $this->userCount]);
    }
}
