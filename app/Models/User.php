<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id'; 
    public $incrementing = true;     
    protected $keyType = 'int';      


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'account_type', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
        'email_verified_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationship: A User can have one Technician profile.
     */
    public function technician(): HasOne
    {
        return $this->hasOne(Technician::class, 'user_id', 'user_id');
    }

    /**
     * Relationship: A User can have one Customer profile.
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, 'user_id', 'user_id');
    }

    /**
     * Relationship: A User can have many User Attachments.
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(UserAttachment::class, 'user_id', 'user_id');
    }
}
