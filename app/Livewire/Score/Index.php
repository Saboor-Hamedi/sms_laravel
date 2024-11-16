<?php

namespace App\Livewire\Score;

use App\Models\Scores;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    use AuthorizesRequests;
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
        $scores = Scores::with('user')->latest()->where('user_id', Auth::id())->paginate(3);
        return view('livewire.score.index', ['scores' => $scores])->layout('layouts.app');
    }
}
