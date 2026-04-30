@extends('layouts.app')
@section('title', 'My Projects')
@section('content')
<div class="container py-4">
    @auth
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0">Project Dashboard</h2>
            <a href="{{route('projects.create')}}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus me-1"></i> Create Project
            </a>
        </div>

        @can('admin-only')
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm bg-light">
                        <div class="card-body text-center p-3">
                            <small class="text-muted d-block mb-1">Total Projects</small>
                            <span class="h5 mb-0">{{ $projects->count() }}</span> 
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm bg-light">
                        <div class="card-body text-center p-3">
                            <small class="text-muted d-block mb-1">Total Users</small>
                            <span class="h5 mb-0">{{ Auth::user()->count() }}</span> 
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <div class="row">
            @foreach ($projects as $project)
                @can('view', $project) 
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="card-title">
                                        <a href="{{ route('projects.todos.index', $project) }}" class="text-decoration-none text-dark fw-bold">{{$project->name}}</a> 
                                    </h5>
                                    @can('update', $project) 
                                        <div class="dropdown">
                                            <button class="btn btn-link text-muted p-0" data-bs-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('projects.edit', $project->id) }}">Edit Settings</a></li> 
                                                <li><a class="dropdown-item" href="{{ route('projects.invites_project.index', $project) }}">Invite Members</a></li> 
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                                        @method('DELETE') @csrf 
                                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">Delete Project</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endcan
                                </div>
                                <p class="text-muted small mb-3">{{ $project->description }}</p> 
                                <div class="d-flex align-items-center mt-3">
                                    <small class="text-muted">Lead: <strong>{{ $project->user->name }}</strong></small> 
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                                <a href="{{ route('projects.todos.index', $project) }}" class="btn btn-sm btn-outline-primary w-100">View Todo List</a> 
                            </div>
                        </div>
                    </div>
                @endcan
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <div class="p-5 bg-light rounded-3">
                <p class="lead mb-0">You Must login to see task</p> 
            </div>
        </div>
    @endauth
</div>
@endsection