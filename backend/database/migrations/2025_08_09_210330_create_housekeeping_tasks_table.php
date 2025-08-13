<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('housekeeping_tasks', function (Blueprint $table) {
            $table->id(); // Unique ID for the task
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained(); // The room that needs service
            $table->foreignId('assigned_to')->nullable()->constrained('users'); // The housekeeper assigned to the task
            $table->enum('task_type', ['checkout_clean', 'stayover_clean', 'deep_clean', 'inspection']); // The type of cleaning required
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending'); // The status of the task
            $table->text('instructions')->nullable(); // Special instructions for the housekeeper
            $table->timestamp('completed_at')->nullable(); // When the task was marked as complete
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('housekeeping_tasks');
    }
};



// Manages the daily tasks for the housekeeping team.
// Housekeeping: Views their assigned tasks and updates their status.
// Receptionist / Hotel Owner: Can assign tasks and monitor room cleaning status.
