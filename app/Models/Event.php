<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'topic_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
