<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{

    public function definition(): array
    {

        return [
            'user_id' => User::role('teacher')->inRandomOrder()->first()->id,
            'lastname' => $this->faker->lastName,
            'birthdate' => $this->faker->date,
            'phone' => $this->faker->phoneNumber,
            'country' => $this->faker->country,
            'state' => $this->faker->state,
            'address' => $this->faker->address,
            'description' => $this->faker->text,
            'is_active' => true,
            'created_at' => now(),
        ];
    }
}
