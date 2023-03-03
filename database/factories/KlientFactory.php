<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Klient>
 */
class KlientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->lastName() ,
            'phone_number' => fake()->phoneNumber(),
            'adress' => fake()->address(),
            'email' => fake()->unique()->safeEmail(),
            'field' => fake()->bs(),
            'department' => fake()->jobTitle(),
        ];
    }
}
