<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id', 'plan_name', 'duration_days', 'price', 'discount_price'
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
