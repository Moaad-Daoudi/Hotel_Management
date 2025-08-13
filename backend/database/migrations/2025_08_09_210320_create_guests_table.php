<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id(); // Unique ID for the guest profile
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Links a guest to a login account (if they have one)
            $table->string('first_name'); // Guest's first name
            $table->string('last_name'); // Guest's last name
            $table->string('email')->nullable(); // Guest's contact email
            $table->string('phone')->nullable(); // Guest's contact phone
            $table->string('nationality')->nullable(); // Guest's nationality
            $table->text('special_requests')->nullable(); // Guest's preferences or requests
            $table->timestamps();

            $table->index(['email']);
            $table->index(['first_name', 'last_name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};


// Stores information about the people staying at the hotel.
// Receptionist: Manages guest profiles.
// Guest: Can view and manage their own profile if linked to a user account
