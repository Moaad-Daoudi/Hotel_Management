<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id(); // Unique ID for the request
            $table->foreignId('booking_id')->constrained()->onDelete('cascade'); // The booking this request is for
            $table->foreignId('service_id')->constrained(); // The service being requested
            $table->integer('quantity')->default(1); // How many units of the service
            $table->decimal('total_price', 10, 2); // Calculated price (quantity * service price)
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending'); // The status of the request
            $table->foreignId('assigned_to')->nullable()->constrained('users'); // Which staff member is handling it
            $table->text('notes')->nullable(); // Any special notes from the guest or staff
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};



// Tracks when a guest requests a specific service during their stay.
// Guest: Creates service requests.
// Receptionist / Restaurant Staff / etc.: Views and manages the status of these requests.
