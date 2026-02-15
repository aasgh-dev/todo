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

            <h5 class="card-title">{{$todos->name}}</h5>
            <p class="card-text">{{$todos->description}}.</p>

            <!-- hyperlink to eidt page with parametr to edit it -->
            <a href="{{ route('todos.edit', ['todo'=>$todos->id,'project_id'=>$project_id]) }}"><span class="btn btn-primary">Edit</span></a>


            <form action="{{ route('todos.destroy', $todos->id) }}"
                method="POST" style="display:inline;">

                <!-- why i use method('Delete') cuz post not the correct action to delete and html form doesn't support delete action -->
                @method('DELETE')

                <input type="hidden" name="project_id" value="{{ $project_id }}">

                <!-- csrf is way to protect user from hacker -->
                @csrf

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    Delete
                </button>
            </form>
        </div>
    </div>

@endsection