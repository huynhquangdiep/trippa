<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaTopicMapping extends Model
{
    protected $fillable = [
        'topic_id',
        'media_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
