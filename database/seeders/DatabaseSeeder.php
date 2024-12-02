<?php

namespace Database\Seeders;

use App\Models\Academics;
use App\Models\Posts;
use App\Models\Scores;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected static ?string $password;
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('admin');

        $teacher = User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        $teacher->assignRole('teacher');




        $this->call(AcademicsSeeder::class);
        $this->call(ScoresSeeder::class);
        $this->call(PostsSeeder::class);
    }
}
