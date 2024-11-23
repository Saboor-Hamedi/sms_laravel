<?php

namespace App\Livewire\Chat;

use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Chat extends Component
{
    public $posts = [];
    #[Validate('required|string|max:255')]
    public $name = '';

    public $editingPostId = null;

    protected $listeners = [
        'posts' => 'reloadPosts',

    ];

    public function mount()
    {
        $this->reloadPosts();
    }

    public function edit($postId)
    {
        $post = Posts::findOrFail($postId);
        $this->authorize('update', $post);
        $this->editingPostId = $postId;
        $this->name = $post->name;
    }

    public function save()
    {
        $this->validate();
        $post = Posts::findOrFail($this->editingPostId);

        $post->update([
            'user_id' => Auth::id(),
            'name' => $this->name,
        ]);

        $this->editingPostId = null;
        $this->name = '';

        $this->reloadPosts();
    }


    public function reloadPosts()
    {
        $this->posts = Posts::with(['user'])->orderBy('created_at', 'asc')->get();
    }
    public function cancel()
    {
        $this->editingPostId = null;
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.chat.chat', ['posts' => $this->posts]);
    }
}
