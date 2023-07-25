<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


     class TestEvent implements ShouldBroadcast {

        use Dispatchable, InteractsWithSockets, SerializesModels;

        public string $id;

        /**
        * Create a new event instance.
         *
        * @return void
        */
        public function __construct($id)
       {
            $this->id = $id;
        }

        /**
         * Get the channels the event should broadcast on.
         *
         * @return \Illuminate\Broadcasting\Channel|array
         */
        public function broadcastOn()
        {
       return ['test-channel'];
        }

       public function broadcastAs(){
            return 'test-event';
        }


        public function broadcastWith() {
            return [
                "messages" => Message::where('user_id', $this->id)->get()
            ];
        }
    }
