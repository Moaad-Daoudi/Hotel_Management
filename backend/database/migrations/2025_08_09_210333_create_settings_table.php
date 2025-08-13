<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id(); // Unique ID
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade'); // The hotel these settings apply to
            $table->string('key'); // The unique name of the setting (e.g., "check_in_time", "tax_rate")
            $table->text('value'); // The value of the setting
            $table->string('type')->default('string'); // The data type (string, boolean, json) for casting
            $table->timestamps();

            $table->unique(['hotel_id', 'key']); // A setting key must be unique per hotel
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};



// A flexible key-value store for managing hotel-specific settings.
// Hotel Owner: Manages settings like check-in/out times, tax rates, and hotel policies.
