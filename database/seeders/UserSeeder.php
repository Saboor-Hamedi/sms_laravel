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
        // admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);
        $admin->assignRole('admin');

        // teacher
        $teacher = User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);
        $teacher->assignRole('teacher');

        // student
        $student = User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);
        $student->assignRole('student');

        // parent
        $parent = User::create([
            'name' => 'parent',
            'email' => 'parent@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);
        $parent->assignRole('parent');

        // random student
        $randomStudent = User::factory(100)->create([
            'password' => Hash::make('123'),
        ]);
        $randomStudent->each(function ($student) {
            $student->assignRole('student');
        });

        // random teacher
        $randomTeacher = User::factory(100)->create([
            'password' => Hash::make('123'),
        ]);
        $randomTeacher->each(function ($teacher) {
            $teacher->assignRole('teacher');
        });
    }
}
