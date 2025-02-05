<?php

namespace Database\Factories;

use App\Models\Academic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scores>
 */
class ScoresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'assignment' => $this->faker->numberBetween(0, 100),
            'formative' => $this->faker->numberBetween(0, 100),
            'midterm' => $this->faker->numberBetween(0, 100),
            'final' => $this->faker->numberBetween(0, 100),
            'average' => $this->faker->numberBetween(0, 100),
            'report' => $this->faker->sentence,
            'academic_year_id' => Academic::inRandomOrder()->first()->id,
        ];
    }
}
