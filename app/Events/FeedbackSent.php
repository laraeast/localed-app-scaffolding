<?php

namespace App\Events;

use App\Models\Feedback;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class FeedbackSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\Feedback
     */
    public $feedback;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Feedback  $feedback
     */
    public function __construct(Feedback $feedback)
    {
        //
        $this->feedback = $feedback;
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
