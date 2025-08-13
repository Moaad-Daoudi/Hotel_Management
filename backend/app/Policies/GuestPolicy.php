<?php

namespace App\Policies;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GuestPolicy
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
        return $user->hasPermissionTo('view guests');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Guest $guest): bool
    {
        // A user can view a guest's profile IF:
        // 1. They are staff with permission at a hotel where the guest has stayed.
        // OR
        // 2. They are the guest themselves.
        $isStaffAtHotel = $user->hasPermissionTo('view guests') && $guest->bookings()->where('hotel_id', $user->hotel_id)->exists();
        $isTheGuest = $guest->user_id === $user->id;

        return $isStaffAtHotel || $isTheGuest;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create guests');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Guest $guest): bool
    {
        // A user can update a guest's profile IF they have permission
        // AND are staff at a hotel where the guest has stayed.
        return $user->hasPermissionTo('edit guests') && $guest->bookings()->where('hotel_id', $user->hotel_id)->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Guest $guest): bool
    {
        // Only allow if the user has permission AND the guest has no bookings at all.
        // In reality, you would probably "anonymize" a guest instead of deleting them.
        if ($user->hasPermissionTo('delete guests') && $user->hotel_id) {
            return $guest->bookings()->count() === 0;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Guest $guest): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Guest $guest): bool
    {
        return false;
    }
}
