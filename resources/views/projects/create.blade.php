@extends('layout')


@section('content')
    

<h1>Create a new project</h1>
    <form action="/projects" method="POST">
        @csrf
        <div class="field">
            <label class="label" for="title">Project Title</label>

            <div class="control">
                <input 
                    class="input {{ $errors->has('title')? 'is-danger' : ''}}" 
                    type="text" 
                    name="title" 
                    value="{{ old('title')}}"
                    required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Project Description</label>

            <div class="control">
                    <textarea 
                        name="description" 
                        class="textarea {{ $errors->has('description')? 'is-danger' : ''}}" 
                        value="{{ old('description') }}"
                        required
                    ></textarea>
            </div>
        </div>


        <div class="field">
            <div class="control">
                    <button class="button is-link" type="submit">Create Project</button>
            </div>
        </div>
            
        @include('errors')
    </form>
@endsection