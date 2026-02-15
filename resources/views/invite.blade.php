@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')



    <div class="row mt-3">
        <div class="col-12 align-self-center">
            @foreach ($users as $user)

                <li class="list-group-item">
                    <!-- hyperlink to edit or delete todo -->
                    <a href=""
                        style="color: cornflowerblue">{{$user->name}}</a>

                    <!-- to show who made this todo -->
                    

                </li>
            @endforeach


        </div>
    </div>

@endsection