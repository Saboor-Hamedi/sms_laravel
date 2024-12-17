<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Student;
use App\Models\User;
use Database\Factories\StudentFactory;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory(1)->create();
        // $teachers = User::factory()->count(1)->create()->each(function ($user) {
        //     $user->assignRole('teacher');
        // });
        // // Create grades and associate them with teachers and students
        // Grade::factory()->count(1)->create()->each(function ($grade) use ($teachers, $students) {
        //     $grade->teacher()->associate($teachers->random())->save();
        //     $grade->students()->attach($students->random(1));
        // });
    }
}
