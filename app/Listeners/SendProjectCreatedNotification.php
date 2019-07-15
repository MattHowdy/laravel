<?php

namespace App\Listeners;

use App\Events\ProjectWasPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated as ProjectCreatedMail;


class SendProjectCreatedNotification
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
     * @param  ProjectWasPublished  $event
     * @return void
     */
    public function handle(ProjectWasPublished $event)
    {
        Mail::to($event->project->owner->email)->send(
            new ProjectCreatedMail($event->project)
        );
        
        
    }
}
