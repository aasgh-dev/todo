@extends('layouts.app')
@section('title', 'Invite Team Members')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Invite to Project</h5>
                    <span class="badge bg-light text-dark">{{ $project->name }}</span>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach ($users as $user)
                            @if ($user->id !== $project->user_id && $user->invites_project->where('project_id', $project->id)->isEmpty() && !($user->is_admin)) 
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <span class="fw-semibold text-dark">{{$user->name}}</span> 
                                    </div>
                                    <form action="{{ route('projects.invites_project.store', ['project' => $project]) }}" method="post" class="mb-0">
                                        @csrf 
                                        <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                                        <button type="submit" class="btn btn-sm btn-primary px-3 rounded-pill shadow-sm">
                                            <i class="fas fa-plus me-1"></i> Add
                                        </button> 
                                    </form>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @if($users->isEmpty())
                    <div class="card-body text-center py-5">
                        <p class="text-muted mb-0">No eligible members found to invite.</p>
                    </div>
                @endif
            </div>
            <div class="mt-3 text-center">
                <a href="{{ route('projects.index') }}" class="btn btn-link text-muted text-decoration-none">Cancel and Return</a>
            </div>
        </div>
    </div>
</div>
@endsection