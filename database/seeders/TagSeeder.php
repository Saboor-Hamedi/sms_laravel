<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(20)->create()->each(function ($post) {
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $post->tags()->attach($tags);
        });
    }
}
