<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::pluck('Department_ID');

        Student::factory()
            ->count(20)
            ->create([
                'Department_ID' => fn () => $departments->random(),
            ]);
    }
}