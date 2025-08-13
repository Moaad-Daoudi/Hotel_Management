<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'alt_text', 'order'];

    // An Image can belong to a Hotel, a RoomType, etc.
    public function imageable()
    {
        return $this->morphTo();
    }
}
