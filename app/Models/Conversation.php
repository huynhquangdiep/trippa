<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'type',
        'hasUnreaded',
        'unReadMessageCount',
        'user_id',
        'group_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
