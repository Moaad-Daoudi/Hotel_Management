<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'room_id',
        'location_description',
        'title',
        'description',
        'priority',
        'status',
        'reported_by',
        'assigned_to',
        'resolution_notes',
    ];

    // RELATIONSHIPS
    // A Maintenance Request may be related to a specific Room.
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // A Maintenance Request was reported by a User.
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    // A Maintenance Request is assigned to a User.
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // A Maintenance Request can have many Images (Polymorphic).
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
