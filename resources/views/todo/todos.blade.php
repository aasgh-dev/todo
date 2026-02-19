@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')
    <a href="{{ route('projects.todos.create', $project) }}"><span class="btn btn-primary">Create Todo</span></a>
    <!-- auth use to check if user is entry is permitted -->
    @auth

        <div class="row mt-3">
            @can('admin-only')
                <a href="">Todos: {{ $todos->count() }}</a>
                <a href="">Todos Status is Done : {{ $todos->where('status','done')->count() }}</a>
                <a href="">Todos Status is Todo : {{ $todos->where('status','todo')->count()}}</a>
                <a href="">Todos Status is In Progress : {{ $todos->where('status','in progress')->count() }}</a>

            @endcan
            <br>
            <br>
            <div class="col-12 align-self-center">
                <ul class="list-group">

                    @foreach ($todos as $todo)
                        <li class="list-group-item">

                            <a href="{{ route('projects.todos.show', [$project, $todo]) }}"
                                style="color: cornflowerblue">{{ $todo->name }}</a>

                            <p>Statu : {{ $todo->status}}</p>
                            <p>create by {{ $todo->user->name}}</p>

                            @can('admin-only')
                                <a href="">members : {{ $todo->invites_task()->count() }}</a>
                            @endcan


                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- if not show him a message to login -->
    @else
        <div class="row mt-3">
            <div class="col-12 align-self-center">
                <p>You Must login to see task</p>
            </div>
        </div>
    @endauth

@endsection