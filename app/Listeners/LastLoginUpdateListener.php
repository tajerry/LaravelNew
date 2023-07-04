<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastLoginUpdateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param object $event
     */
    public function handle(object $event): void
    {
        if(isset($event->user) && $event->user instanceof User) {
            $event->user->last_login_at =  now('Europe/Moscow');
            $event->user->save();
        }
    }
}
