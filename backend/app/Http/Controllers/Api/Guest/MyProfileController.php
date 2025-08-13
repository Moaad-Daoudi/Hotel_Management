<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    public function show(Request $request)
    {
        // 1. Get the authenticated user: $user = $request->user();
        // 2. Eager-load their associated guest profile: $user->load('guestProfile');
        // 3. Return the user object (which now contains the guest profile) as JSON.
    }

    public function update(Request $request)
    {
        // 1. Get the authenticated user: $user = $request->user();
        // 2. Validate the incoming data: 'first_name', 'last_name', 'phone', etc.
        //    (Email should have a unique rule that ignores the current user's ID).
        // 3. Update the User model with validated user-specific data.
        // 4. Update the associated Guest model with validated guest-specific data: $user->guestProfile()->update([...]);
        // 5. Return the updated user object as JSON.
    }
}
