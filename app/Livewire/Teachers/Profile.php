<?php

namespace App\Livewire\Teachers;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Lazy;

class Profile extends Component
{

    const CACHE_KEY = 'student_profile';
    const CACHE_TIME = 60;
    const PAGINATE_SIZE = 24;
    #[Layout('layouts.app')]
    #[Lazy]



    public function render()
    {
        $userId = Auth::id();
        $cacheKey = self::CACHE_KEY . $userId;
        $teacher = Cache::remember($cacheKey, self::CACHE_TIME, function () use ($userId) {
            return Teacher::with(['user'])->where('user_id', $userId)->first();
        });
        return view('livewire.teachers.profile', ['teacher' => $teacher]);
    }
}
