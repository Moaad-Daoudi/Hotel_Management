<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'category'];

    // An Amenity can belong to many Hotels.
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'amenity_hotel');
    }

    // An Amenity can belong to many Room Types.
    public function roomTypes()
    {
        return $this->belongsToMany(RoomType::class, 'amenity_room_type');
    }
}
