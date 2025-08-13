<?php

namespace App\Http\Controllers\Api\BackOffice\Reception;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch and paginate Guest records.
        // 2. Allow searching by last name or email.
        // 3. Return the paginated list as JSON.
    }

    public function show(Guest $guest)
    {
        // 1. Eager-load the guest's booking history: $guest->load('bookings');
        // 2. Return the guest object as JSON.
    }

    public function store(Request $request)
    {
        // 1. Validate the new guest's data (name, email, phone).
        // 2. Create the new Guest record.
        // 3. Return the new guest object with a 201 Created status.
    }

    public function update(Request $request, Guest $guest)
    {
        // 1. Validate the updated data.
        // 2. Update the guest record.
        // 3. Return the updated guest object as JSON.
    }
}
