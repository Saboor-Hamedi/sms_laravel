<?php

namespace App\Livewire\Scores;

use App\Models\Scores;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * Livewire Component for managing and displaying scores.
 *
 * @author <Abdul Saboor Hamedi>
 *
 * @version 1.0.1
 *
 * @description This is where the scores load on teachers page. By no means this code is perfect, it's just a starting point
 */
class Index extends Component
{
    use AuthorizesRequests;

    #[Lazy]

    #[Layout('layouts.app')]
    const CACHE_KEY = 'scores';

    const CACHE_TIME = 60;

    const PAGINATE_SIZE = 24;

    public function delete(int $id)
    {
        $score = Scores::findOrFail(id: $id);
        $this->authorize('delete', $score);
        $score->delete();
        $this->forgetCatches();
        session()->flash('success', 'Score deleted successfully.');
    }

    public function forgetCatches()
    {
        Cache::forget($this->getCacheKey());
    }

    public function getCacheKey()
    {
        return self::CACHE_KEY.'_'.Auth::id();
    }

    public function render()
    {
        $userId = Auth::id();
        $cacheKey = $this->getCacheKey();
        $scores = Cache::remember($cacheKey, now()->addMinutes(self::CACHE_TIME), function () use ($userId) {
            return Scores::with(['academic', 'user'])
                ->where('user_id', $userId)
                ->paginate(self::PAGINATE_SIZE);
        });

        $groupedScores = $scores->groupBy('academic.year');

        return view('livewire.scores.index', ['groupedScores' => $groupedScores, 'scores' => $scores]);
    }
}
