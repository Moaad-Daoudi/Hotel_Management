<?php

namespace App\Http\Controllers\Api\BackOffice\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\HousekeepingTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // 1. Get the authenticated user (housekeeper).
        // 2. Fetch HousekeepingTask records.
        // 3. Filter tasks assigned to the current user: ->where('assigned_to', $user->id).
        // 4. Allow further filtering by 'status' (e.g., 'pending').
        // 5. Eager-load the 'room' information.
        // 6. Return the list of tasks as JSON.
    }

    public function update(Request $request, HousekeepingTask $task)
    {
        // 1. Verify that the task is assigned to the authenticated housekeeper. If not, return 403 Forbidden.
        // 2. Validate the request for a new 'status' ('in_progress', 'completed').
        // 3. Update the task status and set 'completed_at' if applicable.
        // 4. If the task is completed, also update the associated Room's 'cleaning_status' to 'clean'.
        // 5. Return the updated task object as JSON.
    }
}
