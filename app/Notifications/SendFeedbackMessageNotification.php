<?php

namespace App\Notifications;

use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendFeedbackMessageNotification extends Notification
{
    use Queueable;

    /**
     * @var \App\Models\Feedback
     */
    protected $feedback;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Feedback $feedback
     */
    public function __construct(Feedback $feedback)
    {
        //
        $this->feedback = $feedback;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
                    ->line(trans('feedback.email.title'))
                    ->line(trans('feedback.attributes.name').': '.$this->feedback->name)
                    ->line(trans('feedback.attributes.email').': '.$this->feedback->email)
                    ->line(trans('feedback.attributes.message').': '.$this->feedback->message)
                    ->action(trans('feedback.email.more'), route('dashboard.feedback.show', $this->feedback))
                    ->line(trans('feedback.email.footer'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
