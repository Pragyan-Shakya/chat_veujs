<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    protected  $table = 'Friends';

    protected $fillable = [
        'user_id',
        'friend_id',
    ];
}
