<?php

namespace Database\Seeders;

use App\Models\Academics;
use Illuminate\Database\Seeder;

class AcademicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Academics::factory(4)->create();
    }
}
