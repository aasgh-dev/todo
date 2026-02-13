@extends('layouts.app')

@section('title')
    Project Details
@endsection

@section('content')

    <div class="card text-center mt-5">
        <div class="card-header">
            <b>PROJECT DETAILS</b>
        </div>
        <div class="card-body">

            <h5 class="card-title">{{$project->name}}</h5>
            <p class="card-text">{{$project->description}}.</p>

            <!-- hyperlink to eidt page with parametr to edit it -->
            <a href="{{ route('projects.edit', [$project->id]) }}"><span class="btn btn-primary">Edit</span></a>


            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">

                <!-- why i use method('Delete') cuz post not the correct action to delete and html form doesn't support delete action -->
                @method('DELETE')

                <!-- csrf is way to protect user from hacker -->
                @csrf

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    Delete
                </button>
            </form>
        </div>
    </div>

@endsection