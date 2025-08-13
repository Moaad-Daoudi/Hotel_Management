<?php

namespace App\Http\Controllers\Api\BackOffice\HotelSetup;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a list of room types for a specific hotel.
     */
    public function index(Request $request, Hotel $hotel)
    {
        // 1. Fetch all room types that belong to the specified hotel.
        // 2. Eager-load the amenities for each room type.
        // 3. Return the collection as JSON.
    }

    /**
     * Store a newly created room type in storage for a specific hotel.
     */
    public function store(Request $request, Hotel $hotel)
    {
        // 1. Validate the incoming data: 'name', 'max_occupancy', 'base_price', 'amenities' (as an array of IDs), etc.
        // 2. Create the RoomType record, associating it with the $hotel->id.
        // 3. If 'amenities' are provided, attach them to the new room type using the many-to-many relationship: $roomType->amenities()->attach($request->amenities);
        // 4. Return the new room type object (with amenities loaded) and a 201 Created status.
    }

    /**
     * Update the specified room type in storage.
     */
    public function update(Request $request, RoomType $roomType)
    {
        // 1. Validate the updated data.
        // 2. Update the RoomType model's main details.
        // 3. If 'amenities' are provided, use sync() to update the relationship: $roomType->amenities()->sync($request->amenities);
        // 4. Return the updated room type object (with amenities loaded) as JSON.
    }

    /**
     * Deactivate the specified room type.
     */
    public function destroy(RoomType $roomType)
    {
        // 1. Perform a "soft delete" by setting the 'is_active' flag to false.
        // 2. Do not permanently delete, as it could be linked to past bookings.
        // 3. Return a 204 No Content response.
    }
}
