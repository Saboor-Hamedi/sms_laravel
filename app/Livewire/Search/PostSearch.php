<?php

namespace App\Livewire\Search;

use App\Models\Post;
use Livewire\Component;

class PostSearch extends Component
{
    public $searchTerm = '';
    public $results = [];
    public $selectedPost = null;
    public $showDropdown = false;

    public function updatedSearchTerm()
    {
        if (!$this->selectedPost) {
            $this->search();
        }
    }

    public function search()
    {
        if (strlen($this->searchTerm) > 0) {
            $this->results = Post::query()
                ->where('title', 'like', '%' . $this->searchTerm . '%')
                ->limit(5)
                ->get();
            
            $this->showDropdown = true;
        } else {
            $this->results = [];
            $this->searchTerm = '';
            $this->showDropdown = false;
        }
    }

    public function selectPost($postId)
    {
        $this->selectedPost = Post::find($postId);
        if ($this->selectedPost) {
            $this->searchTerm = $this->selectedPost->title;
            $this->results = [];
            $this->showDropdown = false;
        }
    }

    public function render()
    {
        return view('livewire.search.post-search');
    }
}