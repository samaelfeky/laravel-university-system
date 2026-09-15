<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'Department_Name' => fake()->randomElement([
                'Computer Science',
                'Information Technology',
                'Information Systems',
                'Software Engineering',
                'Computer Engineering',
            ]) . ' ' . fake()->numberBetween(1, 9999),
        ];
    }
}