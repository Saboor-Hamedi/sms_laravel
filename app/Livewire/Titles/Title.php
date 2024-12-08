<?php

namespace App\Livewire\Titles;

use Livewire\Component;

class Title extends Component
{

    public $title = '';
    public function render()
    {
        // dd($this->title);
        return view('livewire.titles.title');
    }
}
