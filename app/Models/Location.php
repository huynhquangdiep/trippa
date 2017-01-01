<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'longitude',
        'latitude',
    ];

    public function tripLocationMappings()
    {
        return $this->hasMany(TripLocationMapping::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
