<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'transaction_id' => 'TRN-' . strtoupper(Str::random(12)),
            'currency' => 'USD',
            'method' => fake()->randomElement(['credit_card', 'cash', 'online']),
            'status' => 'completed',
            'processed_at' => now(),
            'gateway_response' => json_encode(['status' => 'success']),
        ];
    }
}
