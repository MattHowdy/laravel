<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $guarded = [];


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

