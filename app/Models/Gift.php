<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = [
        'name',
        'point',
        'total',
    ];

    public function userGiftMappings()
    {
        return $this->hasMany(UserGiftMapping::class);
    }
}
