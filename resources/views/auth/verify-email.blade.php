@extends('layouts.app')
@section('title', 'Verify Email')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-lg p-4">
                <div class="card-body">
                    <div class="mb-4">
                        <i class="fas fa-envelope-open-text fa-4x text-primary opacity-25"></i>
                    </div>
                    <h2 class="fw-bold mb-3">Verify Your Email Address</h2> 

                    @if (session('message'))
                        <div class="alert alert-success d-flex align-items-center justify-content-center mb-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <div>A new verification link has been sent to your email.</div> 
                        </div>
                    @endif

                    <p class="text-muted mb-4 lead">
                        Thanks for signing up! Please check your inbox and click the verification link to get started. 
                    </p>
                    <p class="text-muted small italic">Didn't receive the email? We can send another.</p> 

                    <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
                        @csrf 
                        <button type="submit" class="btn btn-primary px-5 rounded-pill shadow-sm">
                            Resend Verification Email 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection