<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'booking_id',
        'guest_id',
        'invoice_date',
        'due_date',
        'total_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'due_date' => 'date',
    ];

    // An Invoice belongs to one Booking.
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // An Invoice belongs to one Guest.
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    // An Invoice has many individual line items.
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    // An Invoice can have many Payments made against it.
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
