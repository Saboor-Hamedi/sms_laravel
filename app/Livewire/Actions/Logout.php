<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Lazy;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    #[Lazy]
    public function __invoke(): void
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
    }
}
