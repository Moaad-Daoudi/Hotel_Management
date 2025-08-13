<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'description',
        'quantity',
        'unit_price',
        'total_amount',
        'itemable_id',
        'itemable_type',
    ];

    // RELATIONSHIPS
    // An Invoice Item belongs to one Invoice.
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    // This is the other half of the polymorphic relationship.
    // An item can be a Booking, a ServiceRequest, etc.
    public function itemable()
    {
        return $this->morphTo();
    }
}
