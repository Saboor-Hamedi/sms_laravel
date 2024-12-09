<?php

namespace App\Livewire\Scores;

use App\Models\Scores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ScoresAdmin extends Component
{

    const CACHE_KEY = 'scores';
    const CACHE_TIME = 60;
    const PAGINATE_SIZE = 24;
    #[Layout('layouts.app')]
    public function render()
    {
        // $scores = Scores::with(['academic'])
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);

        $userId = Auth::id();
        $cacheKey = self::CACHE_KEY . '_' . $userId;
        $scores = Cache::remember($cacheKey, self::CACHE_TIME, function () use ($userId) {
            return Scores::with(['academic', 'user']) // Eager load 'academic' and 'user'
                ->latest()
                ->paginate(self::PAGINATE_SIZE);
        });
        return view('livewire.scores.scores-admin', ['scores' => $scores]);
    }
}
