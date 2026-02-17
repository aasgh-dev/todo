
@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')
    <form action="{{route('projects.todos.store',$project)}}" method="post" class="mt-4 p-4">
        @csrf 
        <div class="form-group m-3">
            <label for="name">Todo Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        
        <div class="form-group m-3">
            <label for="description">Todo Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <input type="hidden" name="project_id" value="{{ $project->id }}">

        <input type="hidden" name="status" value="todo">

        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="submit">
        </div>
    </form>

@endsection