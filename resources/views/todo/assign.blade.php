@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')



    <div class="row mt-3">
        <div class="col-12 align-self-center">
            @foreach ($users as $user)

                @if ($user->invites_todo->where('todo_id', $todo->id)->isEmpty())
                    <li class="list-group-item">
                    
                    <a href="" style="color: cornflowerblue">{{$user->name}}</a>

                    <form action="{{ route('projects.todos.invites_todo.index', ['project' => $project, 'todo' => $todo]) }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        {{-- <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <input type="hidden" name="project_id" value="{{ $project->id }}"> --}}
                        <button type="submit">Add</button>
                    </form>

                    <!-- to show who made this todo -->


                </li>
                   
                @endif
            @endforeach


        </div>
    </div>

@endsection

