<?php

namespace App\Listeners;

use App\Events\FeedbackSent;
use App\Models\Admin;
use App\Notifications\SendFeedbackMessageNotification;
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
     *
     * @return void
     */
    public function handle(FeedbackSent $event)
    {
        Admin::chunk(10, function ($admins) use ($event) {
            Notification::send(
                $admins,
                new SendFeedbackMessageNotification($event->feedback)
            );
        });
    }
}
