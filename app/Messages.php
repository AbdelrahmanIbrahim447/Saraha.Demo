<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
class Messages extends Model
{
    protected $table = 'messages';
    protected $fillable = [
        'message',
        'sender_id',
        'reciver_id'
    ];

    public function sender() {
        return $this->hasOne('App\User', 'id', 'sender_id');
    }  
 	public function reciver() {
    
      return $this->hasOne('App\User', 'id', 'reciver_id');
  }
}
