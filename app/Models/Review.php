<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'technician_id',
        'customer_id',
        'rating',
        'comment',
        'review_date',
    ];

    /**
     * Relationship: A Review belongs to an Order.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    /**
     * Relationship: A Review is given by a Customer.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'user_id');
    }

    /**
     * Relationship: A Review is received by a Technician.
     */
    public function technician(): BelongsTo
    {
        return $this->belongsTo(Technician::class, 'technician_id', 'user_id');
    }
}
