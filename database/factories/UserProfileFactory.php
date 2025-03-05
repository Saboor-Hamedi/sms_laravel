<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = Faker::create();

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'lastname' => $faker->lastName(),
            'bio' => $faker->word(10),
            'school_name' => $faker->word(10),
            'universty_name' => $faker->word(10),
        ];
    }
}
