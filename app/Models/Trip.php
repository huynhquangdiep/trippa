<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'category_trip_id',
    ];

    public function tripLocationMappings()
    {
        return $this->belongsTo(TripLocationMapping::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryTrip()
    {
        return $this->belongsTo(CategoryTrip::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
