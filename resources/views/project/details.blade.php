@extends('layouts.app')
@section('title', 'Project Details')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light py-3">
                    <span class="text-uppercase fw-bold text-muted small">Overview</span>
                </div>
                <div class="card-body p-4 text-center">
                    <h2 class="card-title fw-bold mb-3">{{$project->name}}</h2> 
                    <p class="card-text text-secondary mb-4">{{$project->description}}</p> 

                    <div class="d-flex justify-content-center gap-3 border-top pt-4 mt-2">
                        <a href="{{ route('projects.edit', [$project->id]) }}" class="btn btn-primary px-5">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a> 

                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                            @method('DELETE') 
                            @csrf 
                            <button type="submit" class="btn btn-outline-danger px-4" onclick="return confirm('Are you sure you want to delete this project?')">
                                <i class="fas fa-trash me-1"></i> Delete
                            </button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection