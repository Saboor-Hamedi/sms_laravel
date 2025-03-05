<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'paragraph' => $this->faker->paragraph,
            'is_published' => $this->faker->boolean,
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
