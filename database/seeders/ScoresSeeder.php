<?php

namespace Database\Seeders;

use App\Models\Scores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ini_set('memory_limit', '512M'); // Increase memory limit
        DB::disableQueryLog();

        Scores::factory()->count(10)->create();
    }
}
