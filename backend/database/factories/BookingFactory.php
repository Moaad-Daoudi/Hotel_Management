<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'booking_reference' => 'BK-' . strtoupper(Str::random(6)),
            'adults' => fake()->numberBetween(1, 2),
            'children' => fake()->numberBetween(0, 2),
            'paid_amount' => 0,
            'source' => fake()->randomElement(['direct', 'online', 'phone']),
            'status' => 'pending', 
            'payment_status' => 'pending',
            'notes' => fake()->optional()->paragraph(1),
        ];
    }
}
