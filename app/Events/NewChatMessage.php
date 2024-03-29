<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\ChatMessage;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $chatMessage;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ChatMessage $newMessages )
    {
        
        $this->chatMessage = $newMessages;
    }

    public function broadcastAs() {
        return 'message.new';
   }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // dd("the pusher that is not working inside brodcust in the channale");
        return new PrivateChannel('chat.'.$this->chatMessage->chat_room_id);
        // return new Channel('chat.'.$this->chatMessage->chat_room_id);
    }
}
