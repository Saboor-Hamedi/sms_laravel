<?php

namespace App\Livewire\Scores;

use App\Models\Scores;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Cache;

class Index extends Component
{

    use AuthorizesRequests;

    const CACHE_KEY = 'scores';
    const CACHE_TIME = 60;
    const PAGINATE_SIZE = 24;
    #[Layout('layouts.app')]
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
        // how to add the code below into a cache::remember ? 
        $userId = Auth::id();
        $cacheKey = self::CACHE_KEY . '_' . $userId;
        $scores = Cache::remember($cacheKey, self::CACHE_TIME, function () use ($userId) {
            return Scores::with(['academic', 'user']) // Eager load 'academic' and 'user'
                ->where('user_id', $userId)
                // ->orderBy('year', 'desc')
                ->paginate(self::PAGINATE_SIZE);
        });

        $groupedScores = $scores->groupBy('academic.year');
        return view('livewire.scores.index', ['groupedScores' => $groupedScores, 'scores' => $scores]);
    }
}
