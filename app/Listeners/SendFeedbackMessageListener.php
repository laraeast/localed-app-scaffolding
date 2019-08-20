<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Events\FeedbackSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendFeedbackMessageNotification;

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
        Admin::chunk(10, function ($admins) use ($event) {
            Notification::send(
                $admins,
                new SendFeedbackMessageNotification($event->feedback)
            );
        });
    }
}
