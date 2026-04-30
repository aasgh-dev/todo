@extends('layouts.app')
@section('title', 'Create Account')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4 text-center">
                    <h4 class="fw-bold mb-0">Join the Community</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf 

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label fw-bold small">Full Name</label>
                                <input type="text" name="name" placeholder="John Doe" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" required> 
                                @error('name')
                                    <div class="invalid-feedback small">{{ $message }}</div> 
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Email Address</label>
                            <input type="email" name="email" placeholder="mail@example.com" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" required> 
                            @error('email')
                                <div class="invalid-feedback small">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Password</label>
                                <input type="password" name="password" placeholder="••••••••"
                                    class="form-control @error('password') is-invalid @enderror" required> 
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="••••••••"
                                    class="form-control" required> 
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Create Account</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection