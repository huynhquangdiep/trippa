<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'name',
        'type',
        'metadata',
        'topic_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
