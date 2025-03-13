<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'paragraph' => $this->faker->paragraph,
            'slug' => Str::slug($title),
            'is_published' => $this->faker->boolean,
            'category_id' => Category::inRandomOrder()->first()->id ?? null,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $tags = Tag::inRandomOrder()->take(rand(1, 50))->pluck('id');
            $post->tags()->attach($tags);
        });
    }
}
