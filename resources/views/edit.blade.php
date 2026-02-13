
@extends('layouts.app')
@section('title')
    Edit Todo
@endsection
@section('content')


    <form action="{{ route('todos.update',[$todos->id]) }}" method="post" class="mt-4 p-4">
        
        <!-- why i use method('PUT') cuz post not the correct action to edit and html form doesn't support put action -->
        @method('PUT')

        <!-- csrf is way to protect user from hacker -->
        @csrf 
        <div class="form-group m-3">
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