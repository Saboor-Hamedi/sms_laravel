<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class PostService
{
    const PAGINATE_LENGHT = 10;

    public function fetchPost(string $user, string $orderBy = 'asc')
    {
        return Post::query()
            ->with(['user', 'tags', 'category'])
            ->orderBy('created_at', $orderBy)
            ->where('user_id', $user)
            ->paginate(self::PAGINATE_LENGHT)->withPath(route('post.index', ['user' => $user]))
            ->fragment('users');
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
                'slug' => $uniqueSlug,
                'is_published' => $data['is_published'] ?? false,
                'category_id' => $data['category_id'] ?? null,
            ]);

        } catch (Exception $e) {
            flash()
                ->options([
                    'timeout' => config('customconfig.timetime'),
                    'position' => config('customconfig.position'),
                ])
                ->error('Operation failed.');

            return null;
        }

    }

    public function handleTags($tags)
    {
        $tagsId = [];
        foreach (explode(',', $tags) as $tag) {
            $tag = trim($tag);
            if (! empty($tag)) {
                $tagModel = Tag::firstOrCreate(['name' => $tag]);
                $tagsId[] = $tagModel->id;
            }
        }

        return $tagsId;
    }

    public function showPost(string $slug): ?Post
    {
        return Post::query()
            ->with(['user', 'tags'])
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
            }
            $post->image = $data['image'];
        }
        // Update other fields
        $post->title = $data['title'];
        $post->paragraph = $data['paragraph'];
        $post->is_published = $data['is_published'];
        $post->category_id = $data['category_id'];

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
