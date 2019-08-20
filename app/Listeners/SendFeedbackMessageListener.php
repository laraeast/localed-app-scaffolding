<?php

namespace App\Listeners;

use App\Events\FeedbackSent;
use App\Notifications\SendFeedbackMessageNotification;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendFeedbackMessageListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\FeedbackSent $event
     * @return void
     */
    public function handle(FeedbackSent $event)
    {
        Notification::send(
            User::whereType('admin')->get(),
            new SendFeedbackMessageNotification($event->feedback)
        );
    }
}
