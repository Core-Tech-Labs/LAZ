<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FeedPosted extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $feed;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($feed)
    {
        $this->feed = $feed;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['update-feed'];
    }
}
