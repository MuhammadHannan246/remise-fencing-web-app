<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SupportTicketEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message,$id,$role,$date,$name;
    public function __construct($message,$id,$role,$date,$name)
    {
        $this->message = $message;
        $this->id = $id;
        $this->role = $role;
        $this->name = $name;
        $this->date = $date;
    }

    public function broadcastOn()
    {
        return ['support-channel'];
    }

    public function broadcastAs()
    {
        return 'support-event';
    }

}
