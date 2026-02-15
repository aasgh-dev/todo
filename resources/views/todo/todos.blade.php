@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')
    <a href="{{route('todos.create',parameters: ['project_id'=>$project_id])}}"><span class="btn btn-primary">Create Todo</span></a>
    <!-- auth use to check if user is entry is permitted -->
    @auth
        <div class="row mt-3">
            <div class="col-12 align-self-center">
                <ul class="list-group">
                    <!-- loop to show all todo -->
                    @foreach ($todos as $todo)
                        <li class="list-group-item">

                            <!-- hyperlink to edit or delete todo -->
                            <a href="{{ route(name: 'todos.show', parameters: ['todo'=>$todo->id,'project_id'=>$project_id]) }}"
                                style="color: cornflowerblue">{{$todo->name}}</a>

                            <!-- to show who made this todo -->
                            <p>create by {{ $todo->user->name}}</p>

                            <a href="{{ route('invite') }}">Invite to Todo</a>
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