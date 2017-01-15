<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'path',
        'card_id',
        'type',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
