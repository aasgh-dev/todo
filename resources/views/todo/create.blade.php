@extends('layouts.app')
@section('title', 'Create Todo')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-white py-3"><h5 class="mb-0">New Todo Item</h5></div>
                <div class="card-body p-4">
                    <form action="{{route('projects.todos.store',$project)}}" method="post">
                        @csrf 
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Todo Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" required> 
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" name="description" rows="4"></textarea> 
                        </div>

                        <input type="hidden" name="project_id" value="{{ $project->id }}"> 
                        <input type="hidden" name="status" value="todo"> 

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Create Task</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection