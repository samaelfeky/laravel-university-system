<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TakesSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $courses = Course::all();

        foreach ($students as $student) {
            $selectedCourses = $courses->random(rand(1, 3));

            foreach ($selectedCourses as $course) {
                DB::table('takes')->insert([
                    'University_ID' => $student->University_ID,
                    'Course_ID' => $course->Course_ID,
                    'Semester' => fake()->randomElement([
                        'Fall 2026',
                        'Spring 2027',
                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}