<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
//      store(Request $request)
// Logic:
// 1.Validate all incoming data (hotel_id, room_type_id, check_in_date, first_name, last_name, email, etc.).
// 2.Run the availability check from the RoomAvailabilityController logic one final time to prevent race conditions. If no rooms are available, return an error.
// 3.Check if user is authenticated: if (Auth::check()).
// 4.If yes, get the user's Guest profile.
// 5.If no, find a Guest by email or create a new one (a "guest checkout").
// 6.Calculate the total_amount based on the room type's base_price and the number of nights.
// 7.Create the Booking record in the database, linking it to the hotel and guest.
// 8.Return a 201 Created response with the new booking's details.
}
