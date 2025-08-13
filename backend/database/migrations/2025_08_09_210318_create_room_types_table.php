<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id(); // Unique ID for the room type
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade'); // Links this room type to a hotel
            $table->string('name'); // Name like "Deluxe King" or "Standard Twin"
            $table->text('description')->nullable(); // Detailed description
            $table->integer('max_occupancy'); // Maximum number of guests
            $table->integer('beds_count'); // Number of beds
            $table->string('bed_type'); // e.g., "King", "Queen", "Twin"
            $table->decimal('base_price', 10, 2); // The standard price per night
            $table->boolean('is_active')->default(false); // Is this room type bookable?
            $table->timestamps();
        });

        // Pivot table to link room types to their amenities
        Schema::create('amenity_room_type', function (Blueprint $table) {
            $table->foreignId('amenity_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_type_id')->constrained()->onDelete('cascade');
            $table->primary(['amenity_id', 'room_type_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('amenity_room_type');
        Schema::dropIfExists('room_types');
    }
};


// Defines the categories of rooms a hotel offers (e.g., "Deluxe King").
// Hotel Owner: Manages the room types, pricing, and amenities.
// Receptionist: Reads this information for bookings.
