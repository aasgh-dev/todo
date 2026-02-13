@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')
    @auth
        <div class="row mt-3">
            <div class="col-12 align-self-center">
                <ul class="list-group">
                    @foreach ($todos as $todo)
                        <li class="list-group-item"><a href="{{ route(name: 'todos.show', parameters: [$todo->id]) }}"
                                style="color: cornflowerblue">{{$todo->name}}</a>
                            <p>create by {{ $todo->user->name}}</p>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <div class="row mt-3">
            <div class="col-12 align-self-center">
                <p>You Must login to see task</p>
            </div>
        </div>
    @endauth


@endsection