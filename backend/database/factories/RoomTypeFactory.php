<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeFactory extends Factory
{
    public function definition(): array
    {
        $roomNames = ['Deluxe King', 'Standard Twin', 'Ocean View Suite', 'Junior Suite', 'Presidential Suite'];
        $bedTypes = ['King', 'Queen', 'Double', 'Single'];

        return [
            'name' => fake()->randomElement($roomNames),
            'description' => fake()->paragraph(2),
            'max_occupancy' => fake()->numberBetween(1, 4),
            'beds_count' => fake()->numberBetween(1, 2),
            'bed_type' => fake()->randomElement($bedTypes),
            'base_price' => fake()->randomElement([99.99, 129.99, 149.99, 199.99, 249.99]),
            'is_active' => true,
        ];
    }
}
