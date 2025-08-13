<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'room_id',
        'assigned_to',
        'task_type',
        'status',
        'instructions',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    // A Housekeeping Task is for a specific Room.
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // A Housekeeping Task is assigned to a staff member (User).
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
