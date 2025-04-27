<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'description', 'contact_number', 'email', 
        'address_line1', 'address_line2', 'city', 'state', 'postal_code', 
        'google_maps_embed', 'cancellation_policy'
    ];

    // Define relationships
    public function operatingHours()
    {
        return $this->hasMany(OperatingHour::class);
    }

    public function gymImages()
    {
        return $this->hasMany(GymImage::class);
    }

    public function membershipPlans()
    {
        return $this->hasMany(MembershipPlan::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'gym_amenities');
    }
}
