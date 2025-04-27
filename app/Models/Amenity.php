<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Define many-to-many relationship with Gym model
    public function gyms()
    {
        return $this->belongsToMany(Gym::class, 'gym_amenities');
    }
}
