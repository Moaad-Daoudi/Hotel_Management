<?php

namespace App\Http\Controllers\Api\BackOffice\Reception;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch and paginate Booking records.
        // 2. Allow powerful filtering by status, date range, and searching by guest name or reference.
        // 3. Return the filtered, paginated list as JSON.
    }

    public function show(Booking $booking)
    {
        // 1. Eager-load all related data: 'guest', 'room', 'payments', 'invoice'.
        // 2. Return the complete booking object as JSON.
    }

    public function store(Request $request)
    {
        // 1. Similar to public BookingController but for creating walk-in/phone bookings.
        // 2. Validate all data.
        // 3. Find or create the Guest profile.
        // 4. Create the Booking record with 'created_by' set to the authenticated receptionist's ID.
        // 5. Return the new booking with a 201 Created status.
    }

    public function update(Request $request, Booking $booking)
    {
        // 1. Validate the incoming fields (e.g., notes, guest count).
        // 2. Update the booking record with the validated data.
        // 3. Return the updated booking object as JSON.
    }

    public function destroy(Booking $booking)
    {
        // 1. Perform a "soft delete" by changing the booking status to 'cancelled'.
        // 2. Add an entry to the ActivityLog for this action.
        // 3. Return a 204 No Content response.
    }
}
