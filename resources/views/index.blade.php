@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')


    <!-- auth use to check if user is entry is permitted -->
    @auth
        <a href="{{route('projects.create')}}"><span class="btn btn-primary">Create Project</span></a>
        <div class="row mt-3">
            <div class="col-12 align-self-center">
                <ul class="list-group">
                    <!-- loop to show all todo -->
                    @foreach ($projects as $project)
                        <li class="list-group-item">
                            <!-- hyperlink to edit or delete todo -->
                            <a href="{{ route(name: 'projects.show', parameters: [$project->id]) }}"
                                style="color: cornflowerblue">{{$project->name}}</a>

                            <!-- to show who made this todo -->
                            <p>Leader {{ $project->user->name}}</p>
                            <form action="{{ route('todos.index') }}">

                                <a href="{{ route(name: 'todos.index', parameters: ['project_id' => $project->id]) }}"
                                    style="color: cornflowerblue">Todo List</a>
                                <!--<input type="hidden" value=" $project->id }}" name="id">-->
                                <!--<button type="submit" value=" $project->id }}" name="ii">Push me</button>-->

                            </form>

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