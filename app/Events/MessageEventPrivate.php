<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;
use App\Models\Permut;

    class MessageEventPrivate implements ShouldBroadcast
    {
        use Dispatchable, InteractsWithSockets, SerializesModels;

        public $user;
        public $permut;

        /**
         * Create a new event instance.
         *
         * @param  $comment
         *
         * @return void
         */

        public function __construct(User $user, Permut $permut)
        {
            //
            $this->user = $user;
            $this->permut = $permut;
        }

        /**
         * Get the channels the event should broadcast on.
         *
         * @return \Illuminate\Broadcasting\Channel|array
         */

        public function broadcastOn()
        {
           return new PrivateChannel('message-channel-private.' . $this->permut->id);
            
        }

    }