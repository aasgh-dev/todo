<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | My Todo App</title>

    <!-- Google Fonts: Inter/Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { font-family: 'Inter', 'Nunito', sans-serif; background-color: #f8f9fa; }
        .navbar { border-bottom: 1px solid #e3e6f0; }
        .btn-primary { border-radius: 8px; }
        .alert { border: none; border-radius: 10px; }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="/">
                <i class="fas fa-check-double me-2"></i>TodoApp
            </a>

            <div class="d-flex align-items-center">
                @auth
                    <div class="dropdown me-3">
                        <span class="text-muted small me-2">Hello,</span>
                        <span class="fw-bold me-3">{{ auth()->user()->name }}</span> 
                    </div>
                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                        @csrf 
                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Logout</button> 
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-link text-decoration-none text-dark me-2">Sign in</a> 
                    <a href="{{route('register')}}" class="btn btn-primary px-4">Sign up</a> 
                @endauth
            </div>
        </div>
    </nav>

    <main class="container">
        <!-- Flash Messages -->
        @if(session()->has('success'))
            <div class="alert alert-success d-flex align-items-center shadow-sm mb-4" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <div>{{ session()->get('success') }}</div> 
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm mb-4">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong class="mb-0">Please check the following errors:</strong>
                </div>
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content') 
    </main>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>