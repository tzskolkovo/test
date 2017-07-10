<?php

namespace Tz\Skolkovo\Listeners;

use Illuminate\Bus\Queueable;
use Tz\Skolkovo\Events\NewOrderAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tz\Skolkovo\Notifications\OrderCreated;

class SendNotifications implements ShouldQueue
{
    use Queueable;
    /**
     * Handle the event.
     *
     * @param  NewOrderAdded  $event
     * @return void
     */
    public function handle(NewOrderAdded $event)
    {
        // Send email/sms notification
        $event->order
            ->notify(with(new OrderCreated($event->order)));
    }
}
