<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Unique ID for the service
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade'); // Which hotel offers this service
            $table->string('name'); // Name of the service (e.g., "Laundry Service", "Airport Transfer")
            $table->text('description')->nullable(); // Detailed description
            $table->enum('category', ['room_service', 'restaurant', 'spa', 'laundry', 'transport', 'other']); // Category for filtering
            $table->decimal('min_price', 10, 2); // The minumum cost of the service
            $table->decimal('max_price', 10, 2); // The max cost of the service
            $table->boolean('is_active')->default(true); // Is this service currently offered?
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};


// A master list of additional services the hotel offers (e.g., laundry, spa).
// Hotel Owner: Defines the services and their prices
