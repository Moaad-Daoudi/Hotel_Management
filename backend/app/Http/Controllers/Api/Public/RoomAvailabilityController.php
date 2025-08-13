<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomAvailabilityController extends Controller
{
//      index(Request $request, Hotel $hotel)
// Logic:
// 1.Validate the request for check_in_date, check_out_date (required, date format, check-out must be after check-in), and adults (required, integer).
// 2.Find all RoomType IDs in the hotel that have enough capacity: ->where('max_occupancy', '>=', $request->adults).
// 3.Find all Room IDs that are booked during the requested date range. This involves a whereHas('bookings', ...) query with a where clause checking for overlapping date ranges.
// 4.Get the room_type_id for all these booked rooms.
// 5.Get the total count of rooms for each RoomType in the hotel.
// 6.Subtract the number of booked rooms from the total rooms for each RoomType.
// 7.Return a list of RoomTypes where the available_rooms > 0, along with their details and price.

}
