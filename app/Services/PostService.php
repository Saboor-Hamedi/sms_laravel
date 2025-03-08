<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
final class PostService
{
    public function fetch(string $user, string $orderBy = 'asc')
    {
        return Post::query()
            ->with('user')
            ->orderBy('created_at', $orderBy)
            ->where('user_id', $user)
            ->paginate(10);
        
    }

    

    public function insert(array $data): Post
{
    // Prevent duplicate slug
    $basedSlug = !empty($data['slug']) ? $data['slug'] : Str::slug($data['title']);
    $dateSegment = now()->format('Ymd'); // e.g., 20231025
    $slug = "{$basedSlug}-{$dateSegment}"; // Combine base slug and date segment
    $counter = 1;
    $uniqueSlug = $slug;

    // Check for uniqueness
    while (Post::where('slug', $uniqueSlug)->exists()) {
        $uniqueSlug = "{$basedSlug}-{$dateSegment}-{$counter}"; // Append counter if needed
        $counter++;
    }

    // Create the post with the unique slug
    return Post::create([
        'user_id' => Auth::user()->id,
        'title' => $data['title'] ?? null,
        'paragraph' => $data['paragraph'] ?? null,
        'image' => $data['image'] ?? null,
        'slug' => $uniqueSlug, // Use the unique slug here
        'is_published' => $data['is_published'] ?? false,
    ]);
}

    public function show(string $slug): ?Post  {
        return Post::query()
            ->with('user')
            ->where('slug', $slug )
            ->firstOrFail();
    }
    public function deletePost(string $slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        if($post->image){
        Storage::disk('public')->delete($post->image);
        }
        $post->delete();
    }
     
}
