<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Amenity name (e.g., "Free WiFi", "Swimming Pool")
            $table->string('icon')->nullable(); // An icon class for the frontend (e.g., "fa-wifi")
            $table->enum('category', ['hotel', 'room', 'general']); // Is it a hotel-wide or room-specific amenity?
            $table->timestamps();
        });

        // Pivot table to link amenities to hotels
        Schema::create('amenity_hotel', function (Blueprint $table) {
            $table->foreignId('amenity_id')->constrained()->onDelete('cascade');
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->primary(['amenity_id', 'hotel_id']); // Ensures each hotel has an amenity only once
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenity_hotel');
        Schema::dropIfExists('amenities');
    }
};


// A master list of all possible amenities, replacing the old json column for better searching.
// Hotel Owner / System Admin: Manages this master list.
