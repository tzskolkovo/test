<?php

namespace Tz\Skolkovo\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Tz\Skolkovo\Channels\SmsChannel;
use Illuminate\Notifications\Messages\NexmoMessage;

class OrderCreated extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', SmsChannel::class];
    }

    public function toMail($notifiable)
    {
        return with(new MailMessage)->view(
            'skolkovo::email.order_notification', ['order' => $notifiable]
        );
    }

    public function toSms($notifiable)
    {
        return with(new NexmoMessage)
            ->content(view('skolkovo::sms.order_notification', ['order' => $notifiable]));
    }

}
