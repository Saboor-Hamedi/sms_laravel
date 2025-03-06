<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

final class PostService
{
    public function fetch(string $user)
    {
        return Post::query()
            ->with('user')
            ->where('user_id', $user)
            ->paginate(10);
    }

    public function insert(array $data): Post
    {
       
        return Post::create([
            'user_id' => Auth::user()->id,
            'title' => $data['title'] ?? null,
            'paragraph' => $data['paragraph'] ?? null,
            'is_published' => $data['is_published'] ?? false,
        ]);
    }
}
