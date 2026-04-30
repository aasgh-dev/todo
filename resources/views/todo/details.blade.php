@extends('layouts.app')
@section('title', 'Task Details')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('projects.todos.index', $project) }}" class="btn btn-link text-decoration-none mb-3"><i class="fas fa-arrow-left"></i> Back to Project</a>
            
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-light py-3 d-flex justify-content-between align-items-center">
                    <span class="text-uppercase fw-bold text-muted small">Todo Details</span>
                    @can('update',$todo) 
                        <span class="badge bg-primary">Active</span>
                    @endcan
                </div>
                <div class="card-body p-4">
                    <h2 class="display-6 fw-bold mb-3">{{$todo->name}}</h2> 
                    <p class="lead text-secondary mb-4">{{$todo->description}}</p> 

                    <div class="d-flex gap-2 border-top pt-4">
                        <a href="{{ route('projects.todos.edit', ['project' => $project, 'todo' => $todo]) }}" class="btn btn-primary px-4">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a> 

                        @can('update',$todo) 
                            <a href="{{ route('projects.todos.invites_todo.index', ['project' => $project, 'todo' => $todo]) }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-user-plus me-1"></i> Assign
                            </a> 

                            <form action="{{ route('projects.todos.destroy', ['project' => $project, 'todo' => $todo]) }}" method="POST" style="display:inline;" class="ms-auto">
                                @method('DELETE') 
                                @csrf 
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button> 
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection