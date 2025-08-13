<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id(); // Unique ID for the request
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->nullable()->constrained(); // The room with the issue (if applicable)
            $table->string('location_description')->nullable(); // Description if not in a room (e.g., "Lobby chandelier")
            $table->string('title'); // A short summary of the issue (e.g., "Leaky Faucet")
            $table->text('description'); // A detailed description of the problem
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->enum('status', ['reported', 'in_progress', 'completed', 'cancelled'])->default('reported');
            $table->foreignId('reported_by')->constrained('users'); // Who reported the issue
            $table->foreignId('assigned_to')->nullable()->constrained('users'); // The maintenance person assigned
            $table->text('resolution_notes')->nullable(); // Notes on how the issue was fixed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance_requests');
    }
};



// Tracks issues and repair jobs throughout the hotel.
// Any Staff Member: Can report an issue.
// Maintenance Staff: Is assigned requests and updates their status.
// Hotel Owner: Oversees maintenance issues and costs.
