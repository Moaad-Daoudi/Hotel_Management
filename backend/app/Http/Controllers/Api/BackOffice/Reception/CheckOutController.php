<?php

namespace App\Http\Controllers\Api\BackOffice\Reception;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function store(Request $request, Booking $booking)
    {
        // 1. Validate that the booking status is 'checked_in'. If not, return a 409 Conflict error.
        // 2. Check the booking's payment_status. If it's not 'paid', you might return an error or handle payment here.
        // 3. Use a DB::transaction for data integrity.
        // 4. Inside the transaction:
        //    a. Update the Booking: set status to 'checked_out', 'checked_out_at' to now(), and 'checked_out_by' to the current user's ID.
        //    b. Update the associated Room: set status to 'available' and cleaning_status to 'dirty'.
        //    c. (Optional) Generate a final invoice if one doesn't exist.
        // 5. Create an ActivityLog entry for the check-out event.
        // 6. Return a successful JSON response.
    }
}
