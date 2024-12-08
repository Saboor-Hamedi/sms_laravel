<?php

namespace App\Livewire\Scores;

use App\Models\Scores;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Layout;

class Index extends Component
{

    use AuthorizesRequests;
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
        $scores = Scores::with(['academic'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(24);
        return view('livewire.scores.index', ['scores' => $scores]);
    }
}
