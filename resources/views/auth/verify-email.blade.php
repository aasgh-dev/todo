@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header">Verify Your Email Address</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success mb-6 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="C9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>A new verification link has been sent to your email address.</span>
                            </div>
                        @endif

                        <div class="mb-6 text-gray-600 leading-relaxed">
                            <p>Thanks for signing up! Before getting started, could you verify your email address by
                                clicking on the link we just emailed to you?</p>
                            <p class="mt-2 text-sm italic">If you didn't receive the email, we will gladly send you another.
                            </p>
                        </div>

                        <div class="form-control mt-8">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm w-full">
                                    Resend Verification Email
                                </button>
                            </form>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection