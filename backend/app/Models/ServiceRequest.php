<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'service_id',
        'quantity',
        'total_price',
        'status',
        'assigned_to',
        'notes',
    ];

    // A Service Request belongs to a Booking.
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // A Service Request is for a specific Service from the master list.
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // A Service Request can be assigned to a staff member (User).
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
