<?php

namespace App\Services;

use App\Models\Post;

class FrontService
{
    public function fetchPost()
    {
        return Post::with(['user', 'tags', 'category'])
            ->latest()
            ->paginate(100);
    }

    public function relatedPosts($post)
    {

        return Post::with(['user', 'tags', 'category'])->where('category_id', $post->category_id) // Filter by the same category
            ->where('id', '!=', $post->id) // Exclude the current post
            ->distinct()
            ->limit(4)
            ->get();
    }

    public function showPost(string $slug): ?Post
    {
        return Post::query()
            ->with(['user', 'tags', 'category'])
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
