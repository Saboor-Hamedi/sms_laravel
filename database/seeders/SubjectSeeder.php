<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            "Mathematics",
            "Science",
            "English Language Arts",
            "Social Studies",
            "History",
            "Geography",
            "Biology",
            "Chemistry",
            "Physics",
            "Computer Science",
            "Programming",
            "Data Structures and Algorithms",
            "Database Systems",
            "Artificial Intelligence",
            "Cybersecurity",
            "Economics",
            "Psychology",
            "Sociology",
            "Philosophy",
            "Astronomy",
            "Engineering",
            "Business",
            "Law",
            "Medicine",
            "Art",
            "Music",
            "Physical Education",
            "Health",
            "Foreign Language",
            "Algebra",
            "Geometry",
            "Trigonometry",
            "Calculus",
            "Statistics",
            "Probability",
            "Reading",
            "Writing",
            "Speaking",
            "Listening",
            "Earth Science",
            "Environmental Science",
            "Civics",
            "Literature",
            "Drama"
        ];
        $faker  = Faker::create();
        // random names
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('subjects')->insert([
        //         'name' => $faker->name(30),
        //     ]);
        // }

        foreach ($subjects as $subject) {
            DB::table('subjects')->insert([
                'name' => $subject,
                'created_at' => now(),
            ]);
        }
    }
}
