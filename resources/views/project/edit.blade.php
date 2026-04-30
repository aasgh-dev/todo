@extends('layouts.app')
@section('title', 'Edit Project')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Update Project Details</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('projects.update',[$project->id]) }}" method="post">
                        @method('PUT') 
                        @csrf 
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Project Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $project->name }}"> 
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Project Description</label>
                            <textarea class="form-control" name="description" rows="4">{{$project->description}}</textarea> 
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Save Changes</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection