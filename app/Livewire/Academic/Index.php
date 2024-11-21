<?php

namespace App\Livewire\Academic;

use App\Models\Scores;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $scores = Scores::with(['academic'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(24);

        return view('livewire.academic.index', ['scores' => $scores])->layout('layouts.app');
    }
}
