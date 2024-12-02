<?php

namespace App\Livewire\Academic;

use App\Models\Scores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function render(): mixed
    {
        $scores = Scores::with(['academic'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();


        return view('livewire.academic.index', ['scores' => $scores])->layout('layouts.app');
    }
}
