<?php

namespace App\Listeners;

use App\Events\SiteChanges;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class notifications
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }
// public $message;
    /**
     * Handle the event.
     */
    public function handle(SiteChanges $event)
    {
        $user = $event->user;
        // Log::info('User registered: ' . $user->name);
        return ['message' => $user];
    }
 
}
