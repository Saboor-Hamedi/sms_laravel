<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 

class UserSeeder extends Seeder
{
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com', 
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('123'),
            'remember_token' => Str::random(30),
        ]);
        User::factory()->count(1000)->create();
    }
}
