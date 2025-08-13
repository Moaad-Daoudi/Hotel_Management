<?php

namespace App\Http\Controllers\Api\BackOffice\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomStatusController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch all Room records.
        // 2. Allow filtering by 'cleaning_status' (e.g., 'dirty') and 'assigned_to' housekeeper.
        // 3. Return the list of rooms as JSON.
    }

    public function update(Request $request, Room $room)
    {
        // 1. Validate the request for a new 'cleaning_status' ('clean', 'dirty', 'inspected').
        // 2. Update the cleaning_status on the Room model.
        // 3. Create an ActivityLog entry.
        // 4. Return the updated room object as JSON.
    }
}
