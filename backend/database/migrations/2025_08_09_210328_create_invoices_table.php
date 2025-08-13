<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // Unique ID for the invoice
            $table->string('invoice_number')->unique(); // A unique, sequential number for the invoice
            $table->foreignId('booking_id')->constrained()->onDelete('cascade'); // The booking this invoice is for
            $table->foreignId('guest_id')->constrained(); // The guest being billed
            $table->date('invoice_date'); // The date the invoice was issued
            $table->date('due_date'); // The date payment is due
            $table->decimal('total_amount', 10, 2); // The final amount to be paid
            $table->enum('status', ['draft', 'sent', 'paid', 'overdue', 'void'])->default('draft'); // Status of the invoice
            $table->text('notes')->nullable(); // Any notes on the invoice
            $table->timestamps();
        });

        // This table will store the individual lines on an invoice (e.g., Room Charge, Laundry, Room Service)
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade'); // Link to the parent invoice
            $table->string('description'); // Description of the charge (e.g., "Stay: Oct 1 - Oct 5")
            $table->decimal('quantity', 8, 2); // e.g., 4 (nights)
            $table->decimal('unit_price', 10, 2); // e.g., 150.00
            $table->decimal('total_amount', 10, 2); // quantity * unit_price
            $table->morphs('itemable'); // Polymorphic link to the original source (Booking, ServiceRequest, etc.)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
        Schema::dropIfExists('invoices');
    }
};



// Generates a formal bill for a booking, combining room charges and services.
// Finance / Accountant: Creates, manages, and tracks invoices.
// Receptionist: Can generate invoices at check-out.
// Guest: Views their invoice.
