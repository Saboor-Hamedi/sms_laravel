<?php

namespace App\Livewire\Scores;

use App\Models\Scores;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Lazy;

class Index extends Component
{

    use AuthorizesRequests;
    #[Layout('layouts.app')]
    #[Lazy]
    const CACHE_KEY = 'scores';
    const CACHE_TIME = 60;
    const PAGINATE_SIZE = 24;
    public function delete($id)
    {
        $score = Scores::findOrFail($id);
        // $this->authorize('delete', $score);
        if ($score->user_id !== Auth::id()) {
            session()->flash('success', 'You are not authorized to delete this score.');
            return;
        }

        $score->delete();
        session()->flash('success', 'Score deleted successfully.');
    }
    public function render()
    {
        $userId = Auth::id();
        $cacheKey = self::CACHE_KEY . '_' . $userId;
        $scores = Cache::remember($cacheKey, now()->addMinutes(self::CACHE_TIME), function () use ($userId) {
            return Scores::with(['academic', 'user'])
                ->where('user_id', $userId)
                ->paginate(self::PAGINATE_SIZE);
        });

        $groupedScores = $scores->groupBy('academic.year');
        return view('livewire.scores.index', ['groupedScores' => $groupedScores, 'scores' => $scores]);
    }
}
