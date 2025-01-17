<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $teacher_id = User::role('teacher')->inRandomOrder()->first()->id;
        $teacher_id = Teacher::inRandomOrder()->first()->id;

        return [
            'teacher_id' => $teacher_id,
            'subject_name' => $this->faker->sentence(2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
