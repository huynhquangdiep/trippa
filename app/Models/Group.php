<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
        'subscribe',
        'groupType',
    ];

    public function groupUserMappings()
    {
        return $this->hasMany(GroupUserMapping::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
