<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatroomController extends Controller
{
    //

    public function getFriends(){
        $users = User::get();
        $friends = Auth::user()->friends();
        //dd($friends);
        return view('chat.chat', [
            'friends' => $friends,
            'users' => $users
        ]);
    }

    public function getMyFriend($friend_id){

        $users = User::get();
        $friends = Auth::user()->friends();
        $friend_name = $friends->find($friend_id)->name;

        //dd($friends);
        return view('chat.chatroom', [
            'friends' => $friends,
            'users' => $users,
            'friendId' => $friend_id,
            'friendName' => $friend_name,
        ]);
    }
}
