<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'email', 'phone', 'address',
        'latitude', 'longitude', 'star_rating', 'status',
    ];

    protected $casts = [
        'address' => 'array', // Automatically encode/decode the address JSON
    ];

    // A Hotel has many Room Types.
    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }

    // A Hotel has many physical Rooms.
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    // A Hotel has many Bookings.
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // A Hotel has a many-to-many relationship with Amenities.
    public function amenities()
    {
        // We specify the pivot table 'amenity_hotel'
        return $this->belongsToMany(Amenity::class, 'amenity_hotel');
    }

    // A Hotel can have many Images (Polymorphic relationship).
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // A Hotel has many Settings.
    public function settings()
    {
        return $this->hasMany(Setting::class);
    }
}
