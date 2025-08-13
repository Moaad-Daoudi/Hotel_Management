<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
// store(Request $request)
// Logic:
// 1.Validate the incoming request for first_name (required), last_name (required), email (required, unique in the users table), and password (required, confirmed).
// 2.Create a new User using the validated data. The password should be hashed automatically by the password cast in the User model.
// 3.Assign the default 'Guest' role to the new user: $user->assignRole('Guest');
// 4.Create a corresponding Guest profile linked to this user: Guest::create(['user_id' => $user->id, ...]);
// 5.Return a 201 Created success response. (Optionally, you could also log them in and return a token here).
}
