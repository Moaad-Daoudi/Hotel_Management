<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InvoicePolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
        return null;
    }

    /**
     * Determine whether the user can view the list of invoices for their hotel.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view invoices');
    }

    /**
     * Determine whether the user can view a specific invoice.
     */
    public function view(User $user, Invoice $invoice): bool
    {
        // A user can view an invoice IF:
        // 1. They are finance/reception staff at that hotel.
        // OR
        // 2. They are the guest who owns the invoice.
        $isStaffAtHotel = $user->hasPermissionTo('view invoices') && $user->hotel_id === $invoice->booking->hotel_id;
        $isTheGuest = optional($invoice->guest)->user_id === $user->id;

        return $isStaffAtHotel || $isTheGuest;
    }

    /**
     * Determine whether the user can create invoices.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create invoices');
    }

    /**
     * Determine whether the user can update the invoice.
     */
    public function update(User $user, Invoice $invoice): bool
    {
        // Can update an invoice if they have permission and it hasn't already been paid.
        if ($user->hasPermissionTo('edit invoices') && $user->hotel_id === $invoice->booking->hotel_id) {
            return $invoice->status !== 'paid';
        }
        return false;
    }

    /**
     * Determine whether the user can delete the invoice.
     */
    public function delete(User $user, Invoice $invoice): bool
    {
        // Can only delete draft invoices.
        if ($user->hasPermissionTo('delete invoices') && $user->hotel_id === $invoice->booking->hotel_id) {
            return $invoice->status === 'draft';
        }
        return false;
    }
}
