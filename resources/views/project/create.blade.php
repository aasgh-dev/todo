
@extends('layouts.app')

@section('title')
    Create Project
@endsection

@section('content')

    <form action="{{route('projects.store')}}" method="post" class="mt-4 p-4">
        @csrf 
        <div class="form-group m-3">
            <label for="name">Project Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        
        <div class="form-group m-3">
            <label for="description">Project Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="submit">
        </div>
    </form>

@endsection