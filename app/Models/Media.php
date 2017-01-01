<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'name',
        'url',
    ];

    public function mediaTopicMappings()
    {
        return $this->hasMany(MediaTopicMapping::class);
    }
}
