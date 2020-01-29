<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewUserHasRegisteredEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $phone_number , $code , $email , $password;

    /**
     * Create a new event instance.
     *
     * @param $phone_number
     * @param $code
     * @param $email
     * @param $password
     */
    public function __construct($phone_number , $code  , $email , $password)
    {
        $this->phone_number = $phone_number;
        $this->code = $code;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
