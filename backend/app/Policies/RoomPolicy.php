<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RoomPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         return $user->hasPermissionTo('view rooms');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Room $room): bool
    {
        // Can view if they have permission AND belong to that room's hotel.
        return $user->hasPermissionTo('view rooms') && $user->hotel_id === $room->hotel_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create rooms');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Room $room): bool
    {
        return $user->hasPermissionTo('edit rooms') && $user->hotel_id === $room->hotel_id;
    }

    /**
     * Custom Policy Method: Can the user update just the room's status (occupancy/cleaning)?
     * This allows us to give different permissions for different types of updates.
     */
    public function updateStatus(User $user, Room $room): bool
    {
        // Housekeeping or reception can update a room's status if they belong to the hotel.
        return $user->hasPermissionTo('update room status') && $user->hotel_id === $room->hotel_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Room $room): bool
    {
        return $user->hasPermissionTo('delete rooms') && $user->hotel_id === $room->hotel_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Room $room): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Room $room): bool
    {
        return false;
    }
}
