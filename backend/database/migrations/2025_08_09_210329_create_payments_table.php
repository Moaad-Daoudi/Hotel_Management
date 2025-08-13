<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Unique ID for the payment
            $table->string('transaction_id')->unique(); // A unique ID from the payment gateway or for internal tracking
            $table->foreignId('invoice_id')->nullable()->constrained(); // The invoice this payment is for
            $table->foreignId('booking_id')->constrained(); // The booking this payment is related to
            $table->decimal('amount', 10, 2); // The amount that was paid
            $table->string('currency', 3)->default('USD'); // Currency of the payment
            $table->enum('method', ['cash', 'credit_card', 'bank_transfer', 'online']); // How the payment was made
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded']); // Status of the transaction
            $table->timestamp('processed_at'); // When the payment was processed
            $table->foreignId('processed_by')->nullable()->constrained('users'); // Which staff member processed it
            $table->json('gateway_response')->nullable(); // Stores the raw response from a payment gateway like Stripe
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};



// Records every financial transaction, whether it's a payment from a guest or a refund.
// Finance / Accountant: Records and reconciles payments.
// Receptionist: Records payments made at the front desk.
// Guest: Their online payments are recorded here automatically.
