<?php

namespace App\Listeners;

use App\Events\PostsCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscribers
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
     * @param  PostsCreated  $event
     * @return void
     */
    public function handle(PostsCreated $event)
    {
        // todo: Move send emails to subscribers right here
        var_dump($event->thread['name'] . 'was published to the forum.');
    }
}
