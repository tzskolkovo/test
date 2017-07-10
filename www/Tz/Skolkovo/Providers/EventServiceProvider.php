<?php

namespace Tz\Skolkovo\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Tz\Skolkovo\Events\NewOrderAdded;
use Tz\Skolkovo\Listeners\SendNotifications;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
         NewOrderAdded::class => [
            SendNotifications::class,
        ],
    ];
}
