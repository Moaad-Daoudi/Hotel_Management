<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
//     store(Request $request)
// Logic:
// 1.Validate the incoming request for email (required, email format) and password (required, string).
// 2.Attempt to authenticate the user using Auth::attempt().
// 3.If authentication fails: Throw a ValidationException with a "credentials do not match" error message.
// 4.If authentication succeeds: Retrieve the authenticated User object.
// 5.Delete any old API tokens for this user to ensure only one active session: $user->tokens()->delete();
// 6.Create a new Sanctum token: $token = $user->createToken('api-token')->plainTextToken;
// 7.Return a JSON response containing the user's details (name, email, roles) and the token.


//      destroy(Request $request)
// Logic:
// 1.Retrieve the currently authenticated user via $request->user().
// 2.Delete the specific token that was used for the current request: $user->currentAccessToken()->delete();
// 3.Return a 204 No Content success response.
}
