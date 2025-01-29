<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Academics>
 */
class AcademicsFactory extends Factory
{
    public function definition(): array
    {
        return [
            // 'year' => $this->faker->numberBetween(2010, 2024)
            'year' => $this->faker->unique()->year,
        ];
    }
}
