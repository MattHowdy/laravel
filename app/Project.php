<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;


class Project extends Model
{
    protected $guarded = [];
    // protected $dispatchesEvents = [
    //     'created' => ProjectCreated::class
    // ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created( function ($project){
    //         Mail::to($project->owner->email)->send(
    //             new ProjectCreated($project)
    //         );
    //     });
    // }
    
    

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        return $this->tasks()->create($task);

        // return Task::create([
        //     'project_id' => $this->id,
        //     'description' => $description
        // ]);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

}

