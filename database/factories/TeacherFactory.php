<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'street' => fake()->streetAddress(),
            'city' => fake()->randomElement([
                'Cairo',
                'Giza',
                'Alexandria',
                'Mansoura',
                'Tanta',
                'Shibin El Kom',
            ]),
            'zip' => fake()->postcode(),
            'Department_ID' => null,
            'user_id' => null,
        ];
    }
}