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

                    {{-- dashboard for admin only --}}
                    @can('admin-only')
                        <a href="">Projects: {{ $projects->count() }}</a>
                        <a href="">Users: {{ Auth::user()->count() }}</a>
                    @endcan

                    @foreach ($projects as $project)

                        @can('view', $project)
                            <li class="list-group-item">

                                Name: <a href="" style="color: cornflowerblue">{{$project->name}}</a>
                                <p>Description: {{$project->description}}</p>
                                <p>Leader {{ $project->user->name}}</p>
                                <a href="{{ route('projects.todos.index', $project) }}">Todo List</a>

                                @can('update', $project)
                                    <br>
                                    <a href="{{ route('projects.invites_project.index', $project) }}">invote to project</a>
                                @endcan

                                @can('update', $project)
                                    <br>
                                    <a href="{{ route('projects.edit', $project->id) }}"><span class="btn btn-primary">Edit</span></a>
                                @endcan

                                @can('delete', $project)

                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">

                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>

                                    </form>
                                @endcan
                                <br>
                            </li>
                        @endcan
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