<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {

        return [
            'user_id' => User::role('student')->inRandomOrder()->first()->id,
            'lastname' => $this->faker->lastName,
            'birthdate' => $this->faker->date,
            'phone' => $this->faker->phoneNumber,
            'country' => $this->faker->country,
            'state' => $this->faker->state,
            'address' => $this->faker->address,
            'description' => $this->faker->text,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
