<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'technician_id',
        'date',
        'status',
        'total_price',
    ];

    /**
     * Relationship: An Order belongs to a Customer.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'user_id');
    }

    /**
     * Relationship: An Order belongs to a Technician.
     */
    public function technician(): BelongsTo
    {
        return $this->belongsTo(Technician::class, 'technician_id', 'user_id');
    }

    /**
     * Relationship: An Order can have many Order Attachments.
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(OrderAttachment::class, 'order_id', 'order_id');
    }

    /**
     * Relationship: An Order can have many Reviews.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'order_id', 'order_id');
    }
}
