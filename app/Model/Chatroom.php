<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    //
    protected $fillable = [
            'user_id',
            'message',
        ];

    protected function users(){
        return $this->belongsTo('App\User');
    }
}
