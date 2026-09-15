<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'Course_Name' => fake()->randomElement([
                'Database Systems',
                'Web Development',
                'Software Engineering',
                'Data Structures',
                'Computer Networks',
                'Operating Systems',
                'Artificial Intelligence',
                'Machine Learning',
                'Computer Architecture',
                'Information Systems',
                'Algorithms',
                'Cyber Security',
                'Mobile Development',
                'Cloud Computing',
                'Human Computer Interaction',
            ]) . ' ' . fake()->numberBetween(1, 99999),

            'Course_Fee' => fake()->randomFloat(
                2,
                100,
                5000
            ),
        ];
    }
}