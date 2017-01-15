<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, SoftDeletes, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'fullname',
        'birthday',
        'gender',
        'avatar',
        'address',
        'last_logged_at',
        'password_changed_at',
        'status',
        'api_token',
        'introduction',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function relationships()
    {
        return $this->hasMany(Relationship::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
