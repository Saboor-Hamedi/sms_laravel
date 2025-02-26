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
        // Academic::factory(20)->create();
        $years = collect(range(2000, 2025))
            ->shuffle()
            ->take(20);

        $years->each(function ($year) {
            Academic::updateOrCreate(['year' => $year]);
        });
    }
}
