<?php

namespace App\Http\Controllers\Api;

use App\Events\BroadcastMessages;
use App\Models\Message;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    //
    public function fetchMessages($friend_id)
    {
        $user_id = Auth::id();

        $messages = Message::where(function ($query) use ($user_id, $friend_id) {
            $query->where('user_id', $user_id)->where('friend_id', $friend_id);
        })->orWhere(function ($query) use ($user_id, $friend_id) {
            $query->where('friend_id', $user_id)->where('user_id', $friend_id);
        })->get();

        /*$data = [];

        foreach ($messages as $message) {
            $data[] = [
                'message' => $message->message,
                'user_id' => User::find($user_id),
                'friend_id' => User::find($friend_id),
            ];
        }*/

//        return response()->json(['messages' => $data], 200);
        return response()->json(['messages' => $messages], 200);
    }

    public function getSelectedFriend($friend_id){
        return response()->json(['friend' => User::find($friend_id)], 200);
    }

    public function getAuthUser(){
        return response()->json(['user' => Auth::user()], 200);
    }

    public function storeMessage(Request $request){
        $this->validate($request, [
            'user_id' => 'required',
            'message' => 'required',
            'friend_id' => 'required',
        ]);

        $message = Message::create([
            'user_id' => $request->input('user_id'),
            'friend_id' => $request->input('friend_id'),
            'message' => $request->input('message'),
        ]);

        broadcast(new BroadcastMessages($message))->toOthers();

        return response()->json(['message' => $message], 200);

    }
}
