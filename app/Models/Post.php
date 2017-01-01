<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'allow_comment',
        'kind',
        'distance',
        'category_post_id',
        'trip_id',
        'location_id',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function categoryPost()
    {
        return $this->belongsTo(CategoryPost::class);
    }

    public function mediaTopicMappings()
    {
        return $this->hasMany(MediaTopicMapping::class);
    }
}
