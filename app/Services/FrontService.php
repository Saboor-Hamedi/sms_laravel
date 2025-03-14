<?php

namespace App\Services;

use App\Models\Post;

class FrontService
{
    public function fetchPost()
    {
        return Post::with(['user', 'tags', 'category'])
            ->latest()
            ->paginate(10);
    }
}
