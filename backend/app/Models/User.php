<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; // Import Spatie's HasRoles trait
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    // Order of traits doesn't matter, but it's good to keep them organized
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'status',
        'avatar',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'password' => 'hashed',
    ];

    // RELATIONSHIPS
    public function guestProfile()
    {
        return $this->hasOne(Guest::class);
    }

    public function createdBookings()
    {
        return $this->hasMany(Booking::class, 'created_by');
    }

    public function housekeepingTasks()
    {
        return $this->hasMany(HousekeepingTask::class, 'assigned_to');
    }

    public function maintenanceAssignments()
    {
        return $this->hasMany(MaintenanceRequest::class, 'assigned_to');
    }


    // METHODS
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->first_name} {$this->last_name}",
        );
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isStaffOf(Hotel $hotel): bool
    {
        return $this->hotel_id === $hotel->id;
    }

    public function recordLogin(): self
    {
        $this->last_login_at = now();
        $this->save();

        return $this;
    }
}
