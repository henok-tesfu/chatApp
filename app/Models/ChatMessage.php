<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use pp\Models\ChatRoom;

class ChatMessage extends Model
{
    use HasFactory;

    public function room()
    {
       return $this->hasOne(ChatRoom::class, 'id','chat_room_id');
    }
    public function user()
    {
       return $this->belongsTo(User::class,'user_id');
    }
}

