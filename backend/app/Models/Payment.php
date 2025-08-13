<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'invoice_id',
        'booking_id',
        'amount',
        'currency',
        'method',
        'status',
        'processed_at',
        'processed_by',
        'gateway_response',
    ];

    protected $casts = [
        'processed_at' => 'datetime',
        'gateway_response' => 'array',
    ];

    // A Payment may be for a specific Invoice.
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    // A Payment is always related to a Booking.
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // A Payment was processed by a staff member (User).
    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
}
