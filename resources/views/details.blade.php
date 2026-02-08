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
            <a href="{{ route('todo.edit', [$todos->id]) }}"><span class="btn btn-primary">Edit</span></a>
            

            <form action="{{ route('todo.destroy', $todos->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    Delete
                </button>
            </form>
        </div>
    </div>

@endsection