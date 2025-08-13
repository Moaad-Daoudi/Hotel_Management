<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id(); // Unique ID for the log entry
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // The user who performed the action
            $table->string('action'); // A machine-readable action name (e.g., "booking.created", "user.login")
            $table->morphs('loggable'); // A polymorphic link to the entity that was changed (a Booking, a Room, etc.)
            $table->text('description'); // A human-readable description (e.g., "User John Doe created booking #12345")
            $table->json('properties')->nullable(); // Stores the "before" and "after" state of changed data
            $table->ipAddress('ip_address')->nullable(); // The IP address of the user
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};



// An audit trail for every important action taken in the system. Crucial for security and tracking.
// Hotel Owner / System Admin: Views the logs to audit actions.
// System: Automatically creates entries in this table for almost all actions.
