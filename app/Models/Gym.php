<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gyms';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id', 'name', 'description', 'address', 'city', 'state', 'postal_code',
        'latitude', 'longitude', 'contact_phone', 'email', 'opening_time', 'closing_time',
        'day_pass_price', 'platform_commission_percentage', 'status', 'rejection_reason',
        'is_active'
    ];
}
