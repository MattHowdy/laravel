<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Filesystem\Filesystem;
use App\Services\Twitter;
use App\Mail\ProjectCreated;


class ProjectsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['index', 'store']);    
        // $this->middleware('auth')->except(['index', 'store']);
        $this->middleware('auth');
    }


    public function index()
    {
        // dd(auth()->id());
        // auth()->user();
        // auth()->check();
        // auth()->guest();

        // $projects = Project::where('owner_id', auth()->id())->get();        
        $projects = auth()->user()->projects;
        
        //set something for cache
        // cache()->rememberForever( 'stats', function(){
        //     return ['lessons' => 1300, 'hours'=>100, 'series'=>10];
        // });

        //get from cache
        // $stats = cache()->get('stats');
        // dump($projects);
        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }


    public function store()
    {
        
        $attributes = $this->validateProject();
        $attributes['owner_id'] = auth()->id();
        $project = Project::create($attributes);

        \Mail::to($project->owner->email)->send(
            new ProjectCreated($project)
        );
        return redirect('/projects');
    }


    public function show(Project $project)
    {
        // $twitter = app('twitter');
        // dd($twitter);

        // gate to set permissions
        // abort_if($project->owner_id != auth()->id(), 403);
        // abort_unless(auth()->user()->owns($project), 403);
        // if(\Gate::denies('update', $project)){
        //    abort(403);
        // }
        // if(\Gate::allows)

        //auth()->user()->can('update', $project);
        // $this->authorize('update', $project);
        return view('projects.show', compact('project'));
    }


    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));   
    }


    public function update(Project $project)
    {
     

        // $this->authorize('update', $project);
        $project->update($this->validateProject());
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }


    public function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
    }
}
