<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Using UUIDs is a common convention for Laravel notifications
            $table->string('type'); // The notification class name
            $table->morphs('notifiable'); // Links to the user being notified
            $table->text('data'); // JSON data for the notification (message, links, etc.)
            $table->timestamp('read_at')->nullable(); // When the user read the notification
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};



// Manages in-app notifications sent to users.
// All Users: Receive notifications relevant to their role.
// System: Generates notifications based on events (new booking, task assigned, etc.).
