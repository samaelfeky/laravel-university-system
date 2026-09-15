<?php

namespace Database\Seeders;

use App\Models\Chairman;
use App\Models\Department;
use Illuminate\Database\Seeder;

class ChairmanSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::all();

        foreach ($departments as $department) {
            Chairman::create([
                'Department_ID' => $department->Department_ID,
            ]);
        }
    }
}