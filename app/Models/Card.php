<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'content',
        'icon',
        'type',
        'status',
        'user_id',
        'category_id',
        'location_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cardTrips()
    {
        return $this->hasMany(CardTrip::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
