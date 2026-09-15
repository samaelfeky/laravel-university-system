<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();

        foreach ($students as $student) {
            DB::table('phone')->insert([
                'University_ID' => $student->University_ID,
                'Phone_Number' => fake()->unique()->numerify('01#########'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}