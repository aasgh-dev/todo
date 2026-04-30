@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                    <h4 class="fw-bold mb-0">Reset Password</h4>
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success d-flex align-items-center mb-4 shadow-sm" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <span>{{ session('status') }}</span> 
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf 

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">Email Address</label>
                            <input type="email" name="email" placeholder="mail@example.com" value="{{ old('email') }}"
                                class="form-control form-control-lg @error('email') is-invalid @enderror" required autofocus> 
                            
                            @error('email')
                                <div class="invalid-feedback small">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                               Send Reset Link 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection