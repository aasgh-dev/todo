@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

    <div class="card text-center mt-5">
        <div class="card-header">
            <b>TODO DETAILS</b>
        </div>
        <div class="card-body">

            <h5 class="card-title">{{$todo->name}}</h5>
            <p class="card-text">{{$todo->description}}.</p>

            <!-- hyperlink to eidt page with parametr to edit it -->
            <a href="{{ route('projects.todos.edit', ['project' => $project, 'todo' => $todo]) }}"><span
                    class="btn btn-primary">Edit</span></a>

            @can('update',$todo)
                <a href="{{ route('projects.todos.invites_todo.index', ['project' => $project, 'todo' => $todo]) }}"><span
                        class="btn btn-primary">Assign</span></a>

                <form action="{{ route('projects.todos.destroy', ['project' => $project, 'todo' => $todo]) }}" method="POST"
                    style="display:inline;">

                    <!-- why i use method('Delete') cuz post not the correct action to delete and html form doesn't support delete action -->
                    @method('DELETE')


                    <!-- csrf is way to protect user from hacker -->
                    @csrf

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            @endcan
        </div>
    </div>

@endsection