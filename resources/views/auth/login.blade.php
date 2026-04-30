@extends('layouts.app')
@section('title', 'Sign In')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4 text-center">
                    <h3 class="fw-bold h4 mb-0">Welcome Back</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Email Address</label>
                            <input type="email" name="email" placeholder="mail@example.com" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" required autofocus> 
                            @error('email')
                                <div class="invalid-feedback small">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Password</label>
                            <input type="password" name="password" placeholder="••••••••"
                                class="form-control @error('password') is-invalid @enderror" required> 
                            @error('password')
                                <div class="invalid-feedback small">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input"> 
                                <label class="form-check-label small" for="remember">Remember me</label> 
                            </div>
                            <a href="{{ route('password.request') }}" class="small text-decoration-none text-muted">
                                Forgot password?
                            </a> 
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Sign In</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection