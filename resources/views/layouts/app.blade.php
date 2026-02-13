<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">

            <!-- this nav bar will appear if there user sign in -->
            @auth
                <a href="/"><span class="navbar-brand mb-0 h2">Todo</span></a>
                <span class="text-sm">{{ auth()->user()->name }}</span>
                <a href="{{route('todos.create')}}"><span class="btn btn-primary">Create Project</span></a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="sumbit" class="btn btn-ghost btn-sm">Logout</button>
                </form>

            <!-- if not login yet -->
            @else
                <a href="{{ route('login') }}"><span class="btn btn-primary">Sign in</span></a>
                <a href="{{route('register')}}"><span class="btn">Sign up</span></a>
            @endauth

        </div>

    </nav>

    <div class="container">

        <!-- dialog message it appear if only if some event happpen -->
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        
        <!-- dialog message it appear if only if some error happpen and can be as list of errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </div>

</body>

</html>