<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SenderMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message,$user,$time,$date;

    public function __construct($message,$user,$time,$date)
    {
        $this->message = $message;
        $this->user = $user;
        $this->time = $time;
        $this->date = $date;
    }

    public function broadcastOn()
    {
        return ['seller-channel'];
    }

    public function broadcastAs()
    {
        return 'seller-event';
    }
}
