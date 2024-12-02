<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'price',
        'phone_num',
        'city',
        'rating',
        'category',
        'availability',
    ];

    /**
     * Relationship: Technician belongs to a User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
