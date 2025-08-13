<?php

namespace App\Http\Controllers\Api\BackOffice\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch and paginate MaintenanceRequest records.
        // 2. Allow filtering by 'status', 'priority', and 'assigned_to'.
        // 3. Return the list as JSON.
    }

    public function show(MaintenanceRequest $request)
    {
        // 1. Eager-load 'room', 'reported_by', 'assigned_to', and 'images'.
        // 2. Return the complete request object as JSON.
    }

    public function update(Request $request, MaintenanceRequest $maintRequest)
    {
        // 1. This is a multi-purpose update method.
        // 2. Validate the incoming data (e.g., 'status', 'assigned_to', 'resolution_notes').
        // 3. Update the MaintenanceRequest model with the validated data.
        // 4. If the status is changed to 'completed', set the 'completed_at' timestamp.
        // 5. Return the updated request object as JSON.
    }
}
