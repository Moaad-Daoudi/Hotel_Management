<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id', 'name', 'description', 'max_occupancy',
        'beds_count', 'bed_type', 'base_price', 'is_active',
    ];

    // A Room Type belongs to one Hotel.
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // A Room Type has many physical Rooms of its kind.
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    // A Room Type has a many-to-many relationship with Amenities.
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'amenity_room_type');
    }

    // A Room Type can have many Images (Polymorphic).
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
