<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'name',
        'description',
        'category',
        'price',
        'is_active',
    ];

    // A Service belongs to one Hotel.
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
