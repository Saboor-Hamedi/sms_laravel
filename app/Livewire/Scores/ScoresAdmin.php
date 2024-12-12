<?php

namespace App\Livewire\Scores;

use App\Models\Scores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ScoresAdmin extends Component
{

    const CACHE_KEY = 'scores_admin';
    const CACHE_TIME = 10;
    const PAGINATE_SIZE = 24;
    #[Layout('layouts.app')]
    public function render()
    {
        $userId = Auth::id();
        $cacheKey = self::CACHE_KEY . '_' . $userId;
        $scores = Cache::remember($cacheKey, now()->addMinutes(self::CACHE_TIME), function () use ($userId) {
            return Scores::with(['academic', 'user'])
                ->latest()
                ->paginate(self::PAGINATE_SIZE);
        });
        return view('livewire.scores.scores-admin', ['scores' => $scores]);
    }
}
