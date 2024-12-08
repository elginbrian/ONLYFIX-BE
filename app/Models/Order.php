<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id'; 
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'technician_id',
        'date',
        'status',
        'total_price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    /**
     * Relationship: An Order belongs to a Customer.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    /**
     * Relationship: An Order belongs to a Technician.
     */
    public function technician(): BelongsTo
    {
        return $this->belongsTo(Technician::class, 'technician_id', 'technician_id');
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
