<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'type',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
