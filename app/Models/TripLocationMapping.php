<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripLocationMapping extends Model
{
    protected $fillable = [
        'trip_id',
        'location_id',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
