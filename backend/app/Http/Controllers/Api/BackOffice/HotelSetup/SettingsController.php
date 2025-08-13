<?php

namespace App\Http\Controllers\Api\BackOffice\HotelSetup;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display all settings for a specific hotel.
     */
    public function index(Request $request, Hotel $hotel)
    {
        // 1. Fetch all settings that belong to the specified hotel.
        // 2. Return the collection as a key-value JSON object for easy use on the frontend.
    }

    /**
     * Update the settings for a specific hotel.
     * This method handles multiple settings at once.
     */
    public function update(Request $request, Hotel $hotel)
    {
        // 1. The request will contain a JSON object or array of key-value pairs, e.g., { "tax_rate": 15, "check_in_time": "14:00" }.
        // 2. Validate the incoming data keys and values.
        // 3. Loop through the validated settings from the request.
        // 4. For each setting, use updateOrCreate() to either create it if it's new or update its 'value' if it exists.
        //    e.g., Setting::updateOrCreate(['hotel_id' => $hotel->id, 'key' => $key], ['value' => $value]);
        // 5. Return a success response with the updated settings.
    }
}
