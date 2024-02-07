<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BroadcastPostCreatedNotification implements ShouldBroadcast, ShouldQueue
{
    /**
     * The post instance.
     *
     * @var Post
     */
    protected $post;

    /**
     * Create the event listener.
     */
    public function __construct(Post $post)
    {
        $this->post = $event->post;
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        // dd($event);
        // If Pusher we will use as broadcast way then need to add corresponding Echo code
    }
}
