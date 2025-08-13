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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // // The official name of the hotel
            $table->string('slug')->unique();   // URL-friendly name
            $table->text('description')->nullable(); // Detailed marketing description
            $table->string('email')->unique(); // Primary contact email for the hotel
            $table->string('phone')->unique(); // Primary contact phone for the hotel
            $table->json('address'); // { "street": "...", "city": "...", "postal_code": "..." }
            $table->decimal('latitude', 10, 8)->nullable(); // For map coordinates
            $table->decimal('longitude', 11, 8)->nullable(); // For map coordinates
            $table->unsignedTinyInteger('star_rating')->nullable(); // Star rating (1-5)
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};

// Purpose: Stores the core information for each hotel property.
// Hotel Owner: Full CRUD (Create, Read, Update, Delete).
// All Other Staff: Reads this information.
