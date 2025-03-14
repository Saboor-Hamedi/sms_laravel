<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public string $title;    // Changed to public

    public string $message;  // Changed to public

    public function __construct(string $title = '', string $message = '')
    {
        $this->title = $title;
        $this->message = $message;
    }

    public function render(): View|Closure|string
    {
        return view('components.hero');
    }
}
