<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    protected $model = Post::class;

    public function run(): void
    {
        Post::factory()->count(100)->create();
    }
}
