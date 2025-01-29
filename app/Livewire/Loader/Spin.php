<?php

namespace App\Livewire\Loader;

use Livewire\Attributes\Lazy;
use Livewire\Component;

class Spin extends Component
{
    #[Lazy]
    protected $listeners = ['showLoader', 'hideLoader'];

    public $isLoading = false;

    public function showLoader()
    {
        $this->isLoading = true;
    }

    public function hideLoader()
    {
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.loader.spin', ['isLoading' => $this->isLoading]);
    }
}
