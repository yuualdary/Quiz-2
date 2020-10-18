<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Todo;

class TodoCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $todo;
    public $joinTodo;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Todo $todo,$joinTodo)
    {
        $this->todo = $todo;
        $this->joinTodo=$joinTodo;

        foreach($joinTodo as $jT){
            $mail=$jT->email;
        }
        $this->mail=$Mail;
    }
    

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('channel-name');
    // }
}
