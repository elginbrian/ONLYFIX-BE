<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'file_url',
        'uploaded_at',
    ];

    /**
     * Relationship: An Order Attachment belongs to an Order.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
