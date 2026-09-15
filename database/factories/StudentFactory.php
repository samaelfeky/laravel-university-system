<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Ahmed Hassan',
                'Omar Mohamed',
                'Sara Ali',
                'Mariam Khaled',
                'Youssef Ahmed',
                'Nour Mohamed',
                'Mahmoud Hassan',
                'Salma Ahmed',
                'Karim Mohamed',
                'Menna Ali',
                'Amr Khaled',
                'Hana Mahmoud',
                'Mostafa Ali',
                'Aya Hassan',
                'Seif Mohamed',
                'Malak Ahmed',
                'Abdelrahman Khaled',
                'Jana Mohamed',
                'Adam Hassan',
                'Farah Ali',
            ]),
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