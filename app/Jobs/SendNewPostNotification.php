<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPostNotification;
use App\Models\User;
use App\Models\Post;

class SendNewPostNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The post instance.
     *
     * @var Post
     */    
    protected $post;

    /**
     * Create a new job instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::where('id', '<>', $this->post->user_id)->get();
        
        foreach ($users as $user) {
            Mail::to($user->email)->send(new NewPostNotification($this->post));
        }
    }
}
