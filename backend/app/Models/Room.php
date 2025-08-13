<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id', 'room_type_id', 'room_number',
        'floor', 'status', 'cleaning_status', 'notes',
    ];

    // RELATIONSHIPS
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function housekeepingTasks()
    {
        return $this->hasMany(HousekeepingTask::class);
    }


    // METHODS
    public function isAvailable(): bool
    {
        return $this->status === 'available' && $this->cleaning_status === 'clean';
    }

    public function markAsOccupied(): self
    {
        $this->status = 'occupied';
        $this->save();
        return $this;
    }

    public function markAsAvailable(): self
    {
        $this->status = 'available';
        $this->cleaning_status = 'clean';
        $this->save();
        return $this;
    }

    public function markAsDirty(): self
    {
        $this->status = 'available';
        $this->cleaning_status = 'dirty';
        $this->save();
        return $this;
    }

    public function placeInMaintenance(): self
    {
        $this->status = 'maintenance';
        $this->save();
        return $this;
    }
}
