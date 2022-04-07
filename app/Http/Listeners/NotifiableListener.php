<?php

namespace App\Http\Listeners;

use App\Http\Events\NotifiableEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifiableListener
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
     * @param  \App\Http\Events\NotifiableEvent  $event
     * @return void
     */
    public function handle(NotifiableEvent $event)
    {
        //
    }
}
