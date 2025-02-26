<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class Profile extends Component
{
    const CACHE_KEY = 'student_profile';

    const CACHE_TIME = 60;

    const PAGINATE_SIZE = 24;

    #[Lazy]

    #[Layout('layouts.app')]
    public function render()
    {
        $userId = Auth::id();
        $cacheKey = self::CACHE_KEY.$userId;
        $student = Cache::remember($cacheKey, self::CACHE_TIME, function () use ($userId) {
            return Student::with(['user'])->where('user_id', $userId)->first();
        });

        return view('livewire.student.profile', ['student' => $student]);
    }
}
