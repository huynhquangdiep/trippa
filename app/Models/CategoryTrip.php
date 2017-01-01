<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTrip extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function trip()
    {
        return $this->hasMany(Trip::class);
    }
}
