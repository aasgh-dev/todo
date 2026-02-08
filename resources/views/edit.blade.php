
@extends('layouts.app')
@section('title')
    Edit Todo
@endsection
@section('content')

    <form action="{{ route('todo.update',[$todos->id]) }}" method="post" class="mt-4 p-4">
        @method('PUT')

        @csrf <div class="form-group m-3">
            <label for="name">Todo Name</label>
            <input type="text" class="form-control" name="name" value="{{ $todos->name }}">
        </div>
        <div class="form-group m-3">
            <label for="description">Todo Description</label>
            <textarea class="form-control" name="description" rows="3">{{$todos->description}}</textarea>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="submit">
        </div>
    </form>

@endsection