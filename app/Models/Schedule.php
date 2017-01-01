<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'name',
        'seconds',
        'type',
        'stopOnError',
        'lastStartUtc',
        'lastEndUtc',
        'lastSuccessUtc',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
