<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'loggable_id',
        'loggable_type',
        'description',
        'properties',
        'ip_address',
    ];

    protected $casts = [
        'properties' => 'array',
    ];

    // RELATIONSHIPS
    // An Activity Log was performed by a User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The polymorphic relationship to the object that was acted upon.
    public function loggable()
    {
        return $this->morphTo();
    }
}
