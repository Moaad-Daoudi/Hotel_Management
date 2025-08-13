<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyBookingController extends Controller
{
    public function index(Request $request)
    {
        // 1. Get the authenticated user: $user = $request->user();
        // 2. Find their associated guest profile: $guest = $user->guestProfile;
        // 3. Fetch all bookings linked to this guest's ID.
        // 4. Return a JSON list of their bookings.
    }

    public function show(Request $request, Booking $booking)
    {
        // 1. Get the authenticated user's guest ID.
        // 2. Check if the booking's guest_id matches the user's guest ID (for security).
        // 3. If it matches, eager-load booking details ('hotel', 'room', 'invoice') and return as JSON.
        // 4. If not, return a 403 Forbidden error.
    }
}
