<?php

namespace App\Livewire\Chat;

use App\Models\Posts;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Chat extends Component
{
    public $posts = [];
    #[Validate('required|string|max:255')]
    public $name = '';

    public $editingPostContent = '';
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
        $this->editingPostId = $postId;
        $this->editingPostContent = $post->name;
    }

    public function save()
    {
        $this->validate([
            'editingPostContent' => 'required|string|max:255',
        ]);

        $post = Posts::find($this->editingPostId);
        $post->name = $this->editingPostContent;
        $post->save();

        $this->editingPostId = null;
        $this->editingPostContent = '';
        $this->reloadPosts();
    }

    public function cancel()
    {
        $this->editingPostId = null;
        $this->editingPostContent = '';
    }

    public function reloadPosts()
    {
        $this->posts = Posts::orderBy('created_at', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.chat.chat', ['posts' => $this->posts]);
    }
}
