<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pathToPhoto($path)
    {
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            $path_ = $path;
        } else {
            $path_ = $path ? url('/') . '/' . $path : "";
        }
        return $path_;
    }

    public function getFullPhotoPath()
    {
        $static_photo_path = asset('dummy-user-photo.png');
        return $this->pathToPhoto(
            $this->photo ? $this->photo : $static_photo_path
        );
    }

    public function friendsOfMine(){
        return $this->belongsToMany(Self::class, 'friends', 'user_id', 'friend_id');
    }

    public function friendsOf(){
        return $this->belongsToMany(Self::class, 'friends', 'friend_id', 'user_id');
    }

    public function friends(){
        return $this->friendsOfMine->merge($this->friendsOf);
    }
}
