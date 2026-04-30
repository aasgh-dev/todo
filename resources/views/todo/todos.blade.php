@extends('layouts.app')
@section('title', 'Project Tasks')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Tasks for {{ $project->name }}</h2>
        <a href="{{ route('projects.todos.create', $project) }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Todo
        </a> 
    </div>

    @auth
        @can('admin-only') 
            <div class="row g-3 mb-4">
                <div class="col-md-3"><div class="p-3 bg-light rounded border text-center"><small>Total</small><h5 class="mb-0">{{ $todos->count() }}</h5></div></div>
                <div class="col-md-3"><div class="p-3 bg-success bg-opacity-10 rounded border border-success text-center text-success"><small>Done</small><h5 class="mb-0">{{ $todos->where('status', 'done')->count() }}</h5></div></div>
                <div class="col-md-3"><div class="p-3 bg-primary bg-opacity-10 rounded border border-primary text-center text-primary"><small>Todo</small><h5 class="mb-0">{{ $todos->where('status', 'todo')->count()}}</h5></div></div>
                <div class="col-md-3"><div class="p-3 bg-warning bg-opacity-10 rounded border border-warning text-center text-warning"><small>Progress</small><h5 class="mb-0">{{ $todos->where('status', 'in progress')->count() }}</h5></div></div>
            </div>
        @endcan

        <div class="list-group shadow-sm">
            @foreach ($todos as $todo)
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-3">
                    <div>
                        <h6 class="mb-1 fw-bold">
                            <a href="{{ route('projects.todos.show', [$project, $todo]) }}" class="text-decoration-none">{{ $todo->name }}</a> 
                        </h6>
                        <small class="text-muted">By {{ $todo->user->name }}</small> 
                    </div>
                    <div class="text-end">
                        <span class="badge rounded-pill {{ $todo->status == 'done' ? 'bg-success' : ($todo->status == 'in progress' ? 'bg-warning text-dark' : 'bg-primary') }}">
                            {{ $todo->status }}
                        </span> 
                        @can('admin-only')
                            <div class="small text-muted mt-1">{{ $todo->invites_task()->count() }} members</div> 
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">You Must login to see task</div> 
    @endauth
</div>
@endsection