<?php

namespace App\Livewire\Academic;

use App\Models\Scores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;


/*
    * This the academic component which displays the scores of the user.
    * This class is responsible for academic years to show it for the teachers 
    * and the scores of the students.
    * 
    * @author: <Abdul Saboor Hamedi>
    * @date: 04/04/2022
    * @version: 1.0
    * @
*/

class Index extends Component
{
    const CACHE_KEY = 'scores';
    const CACHE_TIME = 60;
    const PAGINATE_SIZE = 24;

    #[Layout('layouts.app')]
    public function render(): mixed
    {
        $userId = Auth::id();
        $cacheKey = self::CACHE_KEY . '_' . $userId;



        $scores = Cache::remember($cacheKey, self::CACHE_TIME, function () use ($userId) {
            return Scores::with(['academic', 'user']) // Eager load 'academic' and 'user'
                ->groupBy('year')
                ->where('user_id', $userId)
                ->paginate(self::PAGINATE_SIZE);
        });
        return view('livewire.academic.index', ['scores' => $scores]);
    }
}
