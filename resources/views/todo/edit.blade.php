@extends('layouts.app')
@section('title', 'Edit Todo')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-white py-3"><h5 class="mb-0">Edit Task</h5></div>
                <div class="card-body p-4">
                    <form action="{{ route('projects.todos.update', [$project, $todo]) }}" method="post">
                        @method('PUT') 
                        @csrf 
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Task Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $todo->name }}"> 
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" name="description" rows="4">{{$todo->description}}</textarea> 
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="todo" {{ old('status', $todo->status) == 'todo' ? 'selected' : '' }}>Todo</option> 
                                <option value="in progress" {{ old('status', $todo->status) == 'in progress' ? 'selected' : '' }}>In Progress</option> 
                                <option value="done" {{ old('status', $todo->status) == 'done' ? 'selected' : '' }}>Done</option> 
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Update Task</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection