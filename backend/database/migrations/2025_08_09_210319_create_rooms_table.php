<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // Unique ID for the physical room
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade'); // The hotel this room belongs to
            $table->foreignId('room_type_id')->constrained()->onDelete('cascade'); // The category this room falls into
            $table->string('room_number'); // The number on the door (e.g., "101", "205A")
            $table->integer('floor'); // The floor number
            $table->enum('status', ['available', 'occupied', 'maintenance', 'out_of_order'])->default('available'); // Occupancy status
            $table->enum('cleaning_status', ['clean', 'dirty', 'cleaning', 'inspected'])->default('clean'); // Housekeeping status
            $table->text('notes')->nullable(); // Internal notes about the room
            $table->timestamps();

            // CRITICAL FIX: A room number must be unique within a single hotel, not across the whole platform.
            $table->unique(['hotel_id', 'room_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};

// Represents the individual, physical rooms in the hotel.
// Hotel Owner: Creates the initial list of physical rooms.
// Receptionist: Updates the occupancy status (available, occupied).
// Housekeeping: Updates the cleaning_status.
