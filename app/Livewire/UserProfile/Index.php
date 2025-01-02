<?php

namespace App\Livewire\UserProfile;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Lazy;

/*
* This is where we load the profile of all users 

*/

class Index extends Component
{
    const CACHE_KEY = 'student_profile';
    const CACHE_TIME = 60;
    const PAGINATE_SIZE = 24;

    #[Lazy]

    #[Layout('layouts.app')]
    public function render()
    {

        $userId = Auth::id();
        $cacheKey = self::CACHE_KEY . $userId;
        $student = Cache::remember($cacheKey, self::CACHE_TIME, function () use ($userId) {
            return Student::with(['user'])->where('user_id', $userId)->first();
        });
        return view('livewire.user-profile.index', ['student' => $student]);
    }
}
