<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AmenityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // for clarity and control. This factory is mainly here for completeness.
            'name' => fake()->words(2, true),
            'icon' => 'fa-star',
            'category' => fake()->randomElement(['hotel', 'room']),
        ];
    }
}
