<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relationship extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'following_id',
        'follower_id',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
