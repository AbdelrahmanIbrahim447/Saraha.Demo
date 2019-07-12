<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Message;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','sender_id','reciver_id','status','image'
    ];protected $date = [
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // A user can also receive a message
    public function received()
    {
        return $this->hasMany(Message::class, 'reciver_id');
    }
}

