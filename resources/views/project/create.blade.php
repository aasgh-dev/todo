@extends('layouts.app')
@section('title', 'Create Project')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Start New Project</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{route('projects.store')}}" method="post">
                        @csrf 
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Project Name</label>
                            <input type="text" class="form-control" name="name" placeholder="e.g. Mobile App Development" required> 
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Project Description</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Briefly describe the project goals..."></textarea> 
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Create Project</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection