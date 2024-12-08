<?php

namespace App\Livewire\UserProfile;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    #[Layout('layouts.app')]
    public function render()
    {
        $student = Student::with('user')->where('user_id', Auth::id())->first();
        return view('livewire.user-profile.index', ['student' => $student]);
    }
}
