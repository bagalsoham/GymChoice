<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id', 'day_of_week', 'open_time', 'close_time'
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}

