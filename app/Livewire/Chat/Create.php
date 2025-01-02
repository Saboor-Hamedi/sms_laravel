<?php

namespace App\Livewire\Chat;

use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Lazy;

class Create extends Component
{
    #[Lazy]
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
            if (Auth::check()) {
                Posts::create([
                    'user_id' => Auth::user()->id,
                    'name' => $this->name,
                ]);
                $this->dispatch('posts');
                $this->reset();
            } else {
                $this->reset();
                session()->flash('error', 'Please login to create a post.');
            }
        }
    }


    public function render()
    {
        return view('livewire.chat.create');
    }
}
