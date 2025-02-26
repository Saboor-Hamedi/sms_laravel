<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected static ?string $password;

    public function run(): void
    {

        DB::transaction(function () {
            $this->call(RolePermissionSeeder::class);
            $this->call(UserSeeder::class);
            $this->call([
                PostsSeeder::class,
                StudentSeeder::class,
                TeacherSeeder::class,
                AcademicSeeder::class,
                GradeSeeder::class,
                ScoresSeeder::class,
                SubjectSeeder::class,
            ]);
        });
    }
}
