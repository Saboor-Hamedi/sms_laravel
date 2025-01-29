<?php

namespace App\Livewire\Titles;

use Livewire\Attributes\Lazy;
use Livewire\Component;

class Title extends Component
{
    #[Lazy]
    public $title = '';

    public function render()
    {
        // dd($this->title);
        return view('livewire.titles.title');
    }
}
