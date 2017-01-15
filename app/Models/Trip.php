<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'is_favorite',
        'status',
        'user_id',
        'category_id',
        'start_location_id',
        'end_location_id',
        'started_id',
        'ended_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function cardTrips()
    {
        return $this->hasMany(CardTrip::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
