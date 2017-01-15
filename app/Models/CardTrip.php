<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardTrip extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'card_id',
        'trip_id',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
