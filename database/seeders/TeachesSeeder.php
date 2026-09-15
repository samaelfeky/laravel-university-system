<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachesSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = Teacher::all();
        $courses = Course::all();

        foreach ($teachers as $teacher) {
            $selectedCourses = $courses->random(rand(1, 3));

            foreach ($selectedCourses as $course) {
                DB::table('teaches')->insertOrIgnore([
                    'Course_ID' => $course->Course_ID,
                    'Teacher_ID' => $teacher->Teacher_ID,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}