<?php

namespace App\Listeners;

use App\Events\TodoCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mails\TodoCreatedMail;
class SendEmailNotification
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
     * @param  TodoCreatedEvent  $event
     * @return void
     */
    public function handle(TodoCreatedEvent $event)
    {
      Mail::to($event->email)->send(new TodoCreatedMail($event->joinTodo));

    }
}
