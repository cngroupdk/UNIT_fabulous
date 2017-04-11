<?php

namespace App\Listeners;

use App\Events\MailEvent;
use App\Notifications\Email;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailEventListener
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
     * @param  MailEvent  $event
     * @return void
     */
    public function handle(MailEvent $event)
    {
        if (($event->user != null && $event->user->email != null) || $event->specEmail != null) {
            $event->notify(new Email($event));
        }
    }
}
