<?php

namespace App\Livewire\Scores;

use App\Models\Scores;
use Livewire\Component;

class ScoresAdmin extends Component
{
    public function render()
    {
        $scores = Scores::with(['academic'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.scores.scores-admin', ['scores' => $scores])->layout('layouts.app');
    }
}
