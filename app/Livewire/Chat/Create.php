<?php

namespace App\Livewire\Chat;

use App\Models\Posts;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Create extends Component
{
    #[Validate('required|string|max:255')]
    public $name = '';

    protected $listeners = [
        'posts' => '$refresh',
    ];

    public function save()
    {

        $this->validate();

        // Only save and dispatch if name is not empty
        if (!empty($this->name)) {
            Posts::create([
                'name' => $this->name,
            ]);

            $this->dispatch('posts');
            $this->reset();
        }
    }


    public function render()
    {
        return view('livewire.chat.create');
    }
}
