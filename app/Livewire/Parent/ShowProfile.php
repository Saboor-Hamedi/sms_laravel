<?php

namespace App\Livewire\Parent;

use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class ShowProfile extends Component
{

    #[Layout('layouts.app')]
    #[Lazy]

    const CACHE_KEY = 'parents';
    const CACHE_TIME = 600;

    public $parents = '';

    public function mount()
    {
        $this->parents =   $this->fetchParents() ?: collect();
    }

    public function fetchParents()
    {

        // Query the parents data if not in cache
        return Parents::with('user')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function clearParentsCache()
    {
        // call this method on update and delete
        Cache::forget(self::CACHE_KEY . Auth::id());
    }
    public function render()
    {

        return view('livewire.parent.show-profile');
    }
}
