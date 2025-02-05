<?php

namespace Database\Seeders;

use App\Models\Academic;
use Illuminate\Database\Seeder;

class AcademicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Academic::factory(4)->create();
    }
}
