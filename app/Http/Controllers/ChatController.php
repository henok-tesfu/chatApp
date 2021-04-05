<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    public function rooms()
    {
        return ChatRoom::all();
    }
    public function messages(Request $request,ChatRoom $room)
    {   //validation needed
        return ChatMessage::where('chat_room_id',$room->id)->with('user')->orderBy('created_at','DESC')->get();
    }
    public function newMessage(Request $request,ChatRoom $room)
    {
          //validation needed
          if(Auth::check()){
              $newMessages = new ChatMessage();
              $newMessages->user_id = Auth::id();
              $newMessages->chat_room_id = $room->id;
              $newMessages->message = $request->message;
              $newMessages->save();
             }
        //   auth()->user()->message()->create($newValidData);

        return $newMessages;

         
    }
}
