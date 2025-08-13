<?php

namespace App\Http\Controllers\Api\BackOffice\HotelSetup;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch and paginate all Users who are not guests (use whereHas('roles', ...)).
        // 2. Eager-load their 'roles'.
        // 3. Return the list as JSON.
    }

    public function store(Request $request)
    {
        // 1. Validate the new staff member's data (name, email, password, role).
        // 2. Create the new User.
        // 3. Assign the role from the request: $user->assignRole($request->role);
        // 4. Return the new user object (with roles loaded) and a 201 Created status.
    }

    public function update(Request $request, User $user)
    {
        // 1. Validate the updated data.
        // 2. Update the user's details using $user->update(...).
        // 3. If a new role is provided, update it using $user->syncRoles([$request->role]);
        // 4. Return the updated user object as JSON.
    }

    public function destroy(User $user)
    {
        // 1. Perform a "soft delete": update the user's status to 'inactive'.
        // 2. Revoke all of the user's API tokens to log them out everywhere.
        // 3. Return a 204 No Content response.
    }
}
