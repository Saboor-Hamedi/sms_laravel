<?php

namespace App\Livewire\Chat;

use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Chat extends Component
{
    use WithPagination;

    const CACH_KEY = 'posts';

    const CACHE_TIME = 10;

    public $posts = [];

    #[Lazy]
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
        $this->posts = Cache::remember(self::CACH_KEY, now()->addMinutes(self::CACHE_TIME), function () {
            return Posts::with(['user'])->orderBy('created_at', 'asc')->take(100)->get();
            // return Posts::with(['user'])->orderBy('created_at', 'asc')->paginate(10); // Implement pagination
        });
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
