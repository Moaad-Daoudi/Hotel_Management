<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookingPolicy
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
        return $user->hasPermissionTo('view bookings');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Booking $booking): bool
    {
        // A user can view a booking IF:
        // 1. They have the 'view bookings' permission AND are staff at that hotel.
        // OR
        // 2. They are the guest who made the booking.
        $isStaffAtHotel = $user->hasPermissionTo('view bookings') && $user->hotel_id === $booking->hotel_id;
        $isTheGuest = optional($booking->guest)->user_id === $user->id;

        return $isStaffAtHotel || $isTheGuest;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create bookings');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Booking $booking): bool
    {
         // A user can update a booking IF they have permission AND are staff at that hotel,
        // AND the booking is not in a final state.
        if ($user->hasPermissionTo('edit bookings') && $user->hotel_id === $booking->hotel_id) {
            return !in_array($booking->status, ['checked_out', 'cancelled', 'no_show']);
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Booking $booking): bool
    {
        // A user can cancel a booking IF they have permission AND are staff at that hotel,
        // AND the guest has not already checked in.
        if ($user->hasPermissionTo('cancel bookings') && $user->hotel_id === $booking->hotel_id) {
            return !in_array($booking->status, ['checked_in', 'checked_out']);
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Booking $booking): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Booking $booking): bool
    {
        return false;
    }

    /**
     * Custom Policy Method: Can the user perform check-in?
     */
    public function checkIn(User $user, Booking $booking): bool
    {
        if ($user->hasPermissionTo('perform check-in') && $user->hotel_id === $booking->hotel_id) {
            // Can only check-in a 'confirmed' booking.
            return $booking->status === 'confirmed';
        }
        return false;
    }
}
