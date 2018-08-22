<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = 'messages';

    protected $fillable = [
        'friend_id',
        'user_id',
        'message',
    ];

    public function getCreatedAtAttribute($val){
        return $val?date('M d, Y h:i:s', strtotime($val)):null;
    }
}
