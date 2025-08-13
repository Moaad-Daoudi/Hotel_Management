<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    public function definition(): array
    {

        $roomNumber = fake()->unique()->numberBetween(100, 599);

        return [
            'room_number' => $roomNumber,
            'floor' => substr($roomNumber, 0, 1),
            'status' => 'available',
            'cleaning_status' => 'clean',
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
