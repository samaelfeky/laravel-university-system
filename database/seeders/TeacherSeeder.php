<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::pluck('Department_ID');

        Teacher::factory()
            ->count(10)
            ->create([
                'Department_ID' => fn () => $departments->random(),
            ]);
    }
}