@extends('layouts.app')
@section('title', 'Assign Team Members')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 class="mb-4">Invite to Task</h4>
            <ul class="list-group shadow-sm">
                @foreach ($users as $user)
                    @if ($user->invites_todo->where('todo_id', $todo->id)->isEmpty()) 
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar me-3 bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="fw-bold">{{$user->name}}</span> 
                            </div>
                            <form action="{{ route('projects.todos.invites_todo.index', ['project' => $project, 'todo' => $todo]) }}" method="post">
                                @csrf 
                                <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                                <button type="submit" class="btn btn-sm btn-primary px-3">Add</button> 
                            </form>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection