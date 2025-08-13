<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class MyPaymentController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the request: 'booking_id' (required), 'payment_token' (required, from Stripe/Braintree etc.).
        // 2. Get the authenticated user's guest ID.
        // 3. Find the Booking and verify that it belongs to the authenticated guest. If not, return 403 Forbidden.
        // 4. Check if the booking requires payment (e.g., status is 'confirmed' and payment_status is 'pending').
        // 5. Use a payment gateway service class to process the payment with the 'payment_token'.
        // 6. If payment is successful:
        //    a. Create a Payment record in the database with status 'completed'.
        //    b. Update the Booking's 'payment_status' to 'paid'.
        //    c. Return a success response.
        // 7. If payment fails, return a 422 Unprocessable Entity error with the message from the gateway.
    }
}
