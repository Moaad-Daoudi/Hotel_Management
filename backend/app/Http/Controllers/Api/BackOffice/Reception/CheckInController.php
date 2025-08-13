<?php

namespace App\Http\Controllers\Api\BackOffice\Reception;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function store(Request $request, Booking $booking)
    {
        // 1. Validate that the booking status is 'confirmed'. If not, return a 409 Conflict error.
        // 2. Find an 'available' and 'clean' physical Room matching the booking's room_type_id.
        // 3. If no room is found, return a 409 Conflict error with a "no available rooms" message.
        // 4. Use a DB::transaction to ensure data integrity for the next steps.
        // 5. Inside the transaction:
        //    a. Update the Booking: set status to 'checked_in', assign the room_id, set 'checked_in_at', and set 'checked_in_by' to the current user's ID.
        //    b. Update the Room: set status to 'occupied'.
        // 6. Create an ActivityLog entry for the check-in event.
        // 7. Return a successful JSON response.
    }
}
