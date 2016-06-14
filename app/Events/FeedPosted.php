<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FeedPosted extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $newsFeed;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($newsFeed)
    {
        $this->newsFeed = $newsFeed;
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
