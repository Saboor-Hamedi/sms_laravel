<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ini_set('memory_limit', '512M'); // Increase memory limit
        DB::disableQueryLog();
        Posts::factory(10)->create();
    }
}
