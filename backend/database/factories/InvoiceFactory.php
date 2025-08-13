<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    public function definition(): array
    {
        $invoiceDate = fake()->dateTimeThisYear();
        return [
            'invoice_number' => 'INV-' . fake()->unique()->numberBetween(1000, 9999),
            'invoice_date' => $invoiceDate,
            'due_date' => (clone $invoiceDate)->modify('+30 days'),
            'status' => 'draft',
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
