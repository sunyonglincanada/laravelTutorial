<?php

namespace App\Listeners;

use App\Events\PostsCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckForSpam
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
        var_dump('Checking for spam.');
    }
}
