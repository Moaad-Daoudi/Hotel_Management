<?php

namespace App\Http\Controllers\Api\BackOffice\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch and paginate Payment records.
        // 2. Allow filtering by date range, method, and status.
        // 3. Eager-load related booking and guest information for context.
        // 4. Return the list as JSON.
    }

    public function store(Request $request)
    {
        // 1. This method is for manually recording payments (e.g., cash at front desk).
        // 2. Validate the request: 'booking_id', 'amount', 'method'.
        // 3. Use a DB::transaction.
        // 4. Inside the transaction:
        //    a. Create the Payment record.
        //    b. Update the associated Booking's 'paid_amount' and potentially its 'payment_status'.
        // 5. Return the new payment object with a 201 Created status.
    }
}
