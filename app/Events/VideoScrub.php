<?php

namespace App\Events;

use App\Models\User;
use App\Models\Party;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VideoScrub implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $party;
    public $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $party, $time)
    {
        $this->party = $party;
        $this->user = $user;
        $this->time = $time;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('parties.' . $this->party);
    }
}
