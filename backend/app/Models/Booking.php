<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_reference', 'hotel_id', 'guest_id', 'room_id', 'check_in_date',
        'check_out_date', 'adults', 'children', 'total_amount', 'paid_amount', 'source',
        'status', 'payment_status', 'checked_in_at', 'checked_out_at', 'created_by',
        'checked_in_by', 'checked_out_by', 'notes',
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'checked_in_at' => 'datetime',
        'checked_out_at' => 'datetime',
    ];

    // RELATIONSHIPS
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    //METHODS
    protected function numberOfNights(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->check_in_date)->diffInDays(Carbon::parse($this->check_out_date)),
        );
    }

    protected function staySummary(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->numberOfNights} nights (from {$this->check_in_date->format('M d, Y')} to {$this->check_out_date->format('M d, Y')})",
        );
    }

    protected function balance(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->total_amount - $this->paid_amount,
        );
    }

    public function isPast(): bool
    {
        return Carbon::parse($this->check_out_date)->isPast();
    }

    public function isCurrentlyCheckedIn(): bool
    {
        return $this->status === 'checked_in';
    }

    public function performCheckIn(User $staffUser, Room $room): self
    {
        $this->status = 'checked_in';
        $this->checked_in_at = now();
        $this->checked_in_by = $staffUser->id;
        $this->room_id = $room->id;
        $this->save();

        $room->markAsOccupied();

        return $this;
    }

    public function performCheckOut(User $staffUser): self
    {
        $this->status = 'checked_out';
        $this->checked_out_at = now();
        $this->checked_out_by = $staffUser->id;
        $this->save();

        optional($this->room)->markAsDirty();

        return $this;
    }
}
