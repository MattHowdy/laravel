<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;


class ProjectWasPublished
{
    public $project;

    use Dispatchable, SerializesModels;
    

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        //
        $this->project = $project;
    }

}
