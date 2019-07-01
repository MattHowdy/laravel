@extends('layout')


@section('content')
    <h1 class="title"> {{ $project->title }}</h1>
    <div class="content">{{ $project->description }}</div>
    
    <p>
        <a href="/projects/{{ $project->id }}/edit">Edit</a>
    </p>

    @if($project->tasks->count())
        <h2>Project Tasks</h2>
        <div class="box">
            @foreach ($project->tasks as $task)
                <div>
                <form method="POST" action="/completed-tasks/{{ $task->id }}">
                        @if($task->completed)
                            @method('DELETE')
                        @endif
                        @csrf
                        <label for="completed" class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
                            <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            {{ $task->description }}
                        </label>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    {{-- add new task --}}
    <form action="/projects/{{$project->id}}/tasks" class="box" method="POST">
        @csrf
        <div class="field">

            <label for="description" class="label">New Task</label>
            <div class="control">
                <input type="text" class="input" name="description" placeholder="Description" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>
    </form>
    
    @include('errors')

@endsection