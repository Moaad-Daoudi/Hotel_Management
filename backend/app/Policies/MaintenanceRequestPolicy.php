<?php

namespace App\Policies;

use App\Models\MaintenanceRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MaintenanceRequestPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
        return null;
    }

    /**
     * Determine whether the user can view the list of maintenance requests.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view maintenance');
    }

    /**
     * Determine whether the user can view a specific maintenance request.
     */
    public function view(User $user, MaintenanceRequest $maintenanceRequest): bool
    {
        // A user can view a request IF:
        // 1. They are staff at that hotel with permission.
        // OR
        // 2. They are the person who reported the issue.
        $isStaffAtHotel = $user->hasPermissionTo('view maintenance') && $user->hotel_id === $maintenanceRequest->hotel_id;
        $isTheReporter = $user->id === $maintenanceRequest->reported_by;

        return $isStaffAtHotel || $isTheReporter;
    }

    /**
     * Determine whether the user can create maintenance requests.
     */
    public function create(User $user): bool
    {
        // Any staff member at a hotel should be able to report an issue.
        return $user->hasPermissionTo('create maintenance');
    }

    /**
     * Determine whether the user can update a maintenance request.
     */
    public function update(User $user, MaintenanceRequest $maintenanceRequest): bool
    {
        // Only allow updates if the request is not yet completed.
        if ($user->hasPermissionTo('edit maintenance') && $user->hotel_id === $maintenanceRequest->hotel_id) {
            return $maintenanceRequest->status !== 'completed';
        }
        return false;
    }

    /**
     * Determine whether the user can assign a request to a maintenance worker.
     */
    public function assign(User $user, MaintenanceRequest $maintenanceRequest): bool
    {
        // A manager or supervisor can assign tasks.
        return $user->hasPermissionTo('assign maintenance') && $user->hotel_id === $maintenanceRequest->hotel_id;
    }

    /**
     * Determine whether the user can update the status of a request (e.g., to 'in_progress' or 'completed').
     */
    public function updateStatus(User $user, MaintenanceRequest $maintenanceRequest): bool
    {
        // The assigned person OR a manager can update the status.
        $isAssigned = $user->id === $maintenanceRequest->assigned_to;
        $isManager = $user->hasPermissionTo('update maintenance status') && $user->hotel_id === $maintenanceRequest->hotel_id;

        return $isAssigned || $isManager;
    }
}
