@extends('layouts.app')
@section('title', 'Update Password')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                    <h4 class="fw-bold mb-0">Reset Password</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf 
                        
                        <input type="hidden" name="token" value="{{ $token }}"> 

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Email Address</label>
                            <input type="email" name="email" placeholder="mail@example.com" value="{{ $email ?? old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" required autofocus> 
                            
                            @error('email')
                                <div class="invalid-feedback small">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">New Password</label>
                            <input type="password" name="password" placeholder="••••••••"
                                class="form-control @error('password') is-invalid @enderror" required> 
                            
                            @error('password')
                                <div class="invalid-feedback small">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">Confirm New Password</label>
                            <input type="password" name="password_confirmation" placeholder="••••••••"
                                class="form-control" required> 
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                               Update Password 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection