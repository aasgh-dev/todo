@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')



    <div class="row mt-3">
        <div class="col-12 align-self-center">
            @foreach ($users as $user)
                {{-- $users = User::whereDoesntHave('invites_project', function ($query) {
                $query->where('project_id', 2);
                })->get(); --}}
                @if ($user->id !== $project->user_id && $user->invites_project->where('project_id', $project->id)->isEmpty())
                    <li class="list-group-item">

                        <a href="" style="color: cornflowerblue">{{$user->name}}</a>

                        <form action="{{ route('projects.invites_project.store', ['project' => $project]) }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit">Add</button>
                        </form>

                        <!-- to show who made this todo -->


                    </li>

                @endif
            @endforeach


        </div>
    </div>

@endsection