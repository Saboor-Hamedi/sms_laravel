<?php

namespace App\Services;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class PostService
{
    public function fetchPost(string $user, string $orderBy = 'asc')
    {
        return Post::query()
            ->with('user')
            ->orderBy('created_at', $orderBy)
            ->where('user_id', $user)
            ->paginate(10);

    }

    public function insertPost(array $data): ?Post
    {
        // Prevent duplicate slug
        $basedSlug = ! empty($data['slug']) ? $data['slug'] : Str::slug($data['title']);
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
        try {
            return Post::create([
                'user_id' => Auth::user()->id,
                'title' => $data['title'] ?? null,
                'paragraph' => $data['paragraph'] ?? null,
                'image' => $data['image'] ?? null,
                'slug' => $uniqueSlug, // Use the unique slug here
                'is_published' => $data['is_published'] ?? false,
            ]);

        } catch (Exception $e) {
            flash()
                ->options([
                    'timeout' => 3000,
                    'position' => 'top-center',
                ])
                ->error('Operation failed.');

            return null;
        }

    }

    public function showPost(string $slug): ?Post
    {
        return Post::query()
            ->with('user')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function updatePost(string $slug, array $data): ?Post
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        // hand the replacement of the image
        if (array_key_exists('image', $data)) {
            if ($post->image && $data['image'] !== $post->image && $data['image'] !== null) {
                Storage::disk('public')->delete($post->image);
                Log::info('Deleted old image: '.$post->image);
            }
            // Update the image field (could be null if no new image)
            $post->image = $data['image'];
            Log::info('Updated image to: '.$data['image']);
        }
        // Update other fields
        $post->title = $data['title'];
        $post->paragraph = $data['paragraph'];
        $post->is_published = $data['is_published'];

        // Handle slug update if provided (optional)
        if (! empty($data['slug']) && $data['slug'] !== $post->slug) {
            $basedSlug = Str::slug($data['slug']);
            $dateSegment = now()->format('Ymd');
            $newSlug = "{$basedSlug}-{$dateSegment}";
            $counter = 1;
            $uniqueSlug = $newSlug;
            while (Post::where('slug', $uniqueSlug)->exists()) {
                $uniqueSlug = "{$basedSlug}-{$dateSegment}-{$counter}";
                $counter++;
            }
            $post->slug = $uniqueSlug;
        }

        $post->save();

        // Update tags if provided
        if (isset($data['tag_id'])) {
            $post->tags()->sync($data['tag_id']);
        }

        return $post;
    }

    public function deletePost(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
    }
}
