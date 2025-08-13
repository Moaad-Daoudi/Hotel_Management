<?php

namespace App\Http\Controllers\Api\BackOffice\HotelSetup;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a list of all physical rooms for a specific hotel.
     */
    public function index(Request $request, Hotel $hotel)
    {
        // 1. Fetch all rooms that belong to the specified hotel.
        // 2. Allow filtering by 'room_type_id', 'status', or 'cleaning_status'.
        // 3. Eager-load the 'roomType' relationship for context.
        // 4. Return the paginated list as JSON.
    }

    /**
     * Store a newly created physical room in storage.
     */
    public function store(Request $request, Hotel $hotel)
    {
        // 1. Validate the incoming data: 'room_type_id', 'room_number', 'floor'.
        // 2. Ensure the 'room_number' is unique for the given hotel ID (this is handled by the database constraint, but can be pre-emptively checked).
        // 3. Create the Room record, associating it with the $hotel->id.
        // 4. Return the new room object with a 201 Created status.
    }

    /**
     * Update the specified physical room in storage.
     */
    public function update(Request $request, Room $room)
    {
        // 1. Validate the updated data (e.g., 'room_number', 'notes').
        // 2. Update the Room model.
        // 3. Return the updated room object as JSON.
    }

    /**
     * Remove the specified physical room from storage.
     */
    public function destroy(Room $room)
    {
        // 1. Check if the room has any active or future bookings. If so, prevent deletion and return an error.
        // 2. If the room is safe to delete (e.g., only has past bookings), delete the record.
        // 3. NOTE: A "soft delete" (setting a status to 'decommissioned') is often safer for this model.
        // 4. Return a 204 No Content response.
    }
}
