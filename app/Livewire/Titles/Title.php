<?php

namespace App\Livewire\Titles;

use Livewire\Component;
use Livewire\Attributes\Lazy;

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
