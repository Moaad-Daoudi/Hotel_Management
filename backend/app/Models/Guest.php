<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'email', 'phone',
        'date_of_birth', 'nationality', 'special_requests',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    // A Guest profile may be linked to a User account.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A Guest can have many Bookings.
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
