<?php

namespace App\Http\Controllers\Api\BackOffice\HotelSetup;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the new hotel's data (name, email, address, etc.).
        // 2. Create the new Hotel record.
        // 3. Return the new hotel object with a 201 Created status.
    }

    public function update(Request $request, Hotel $hotel)
    {
        // 1. Validate the updated data.
        // 2. Update the hotel record.
        // 3. Return the updated hotel object as JSON.
    }
}
