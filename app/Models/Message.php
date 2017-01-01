<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'textContent',
        'mediaType',
        'sendDate',
        'user_id',
        'attachment_id',
        'conversation_id',
        'group_id',
        'location_id',
    ];

    public function attachment()
    {
        return $this->belongsTo(Attachment::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
