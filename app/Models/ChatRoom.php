<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use pp\Models\ChatMessage;

class ChatRoom extends Model
{
    use HasFactory;

    public function messages()
    {
       return $this->hasMany(ChatMessage::class);
    }
}
