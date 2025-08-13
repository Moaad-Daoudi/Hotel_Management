<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Unique ID for the booking
            $table->string('booking_reference')->unique(); // A guest-facing unique ID (e.g., ABC-12345)
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade'); // The hotel being booked
            $table->foreignId('guest_id')->constrained()->onDelete('cascade'); // The primary guest for the booking
            $table->foreignId('room_id')->nullable()->constrained(); // The specific physical room assigned (can be null until check-in)

            // Booking Details
            $table->date('check_in_date'); // Date of arrival
            $table->date('check_out_date'); // Date of departure
            $table->integer('adults'); // Number of adults
            $table->integer('children')->default(0); // Number of children

            // Pricing
            $table->decimal('total_amount', 10, 2); // The final calculated price for the entire stay
            $table->decimal('paid_amount', 10, 2)->default(0); // How much has been paid so far
            $table->string('source')->default('direct'); // Where the booking came from (e.g., 'direct', 'booking.com', 'phone')

            // Status Management
            $table->enum('status', ['pending', 'confirmed', 'checked_in', 'checked_out', 'cancelled', 'no_show'])->default('pending');
            $table->enum('payment_status', ['pending', 'partial', 'paid', 'refunded'])->default('pending');

            // Timestamps for tracking key events
            $table->timestamp('checked_in_at')->nullable();
            $table->timestamp('checked_out_at')->nullable();

            // Staff & Guest Tracking
            $table->foreignId('created_by')->nullable()->constrained('users'); // Which staff member or guest user created this
            $table->foreignId('checked_in_by')->nullable()->constrained('users'); // Which receptionist handled check-in
            $table->foreignId('checked_out_by')->nullable()->constrained('users'); // Which receptionist handled check-out
            $table->text('notes')->nullable(); // Internal notes about the booking
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};


// This is the core table that connects a guest to a room for a specific period and price.
// Receptionist: Creates and manages bookings, check-ins, and check-outs.
// Guest: Creates their own bookings (if online booking is enabled) and views their booking history.
// Hotel Owner: Views booking data and reports.
