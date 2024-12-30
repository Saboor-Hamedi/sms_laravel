<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    protected static ?string $password;
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);
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

        $this->call(PostsSeeder::class);
        $this->call(AcademicsSeeder::class);
        $this->call(ScoresSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
