@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card ">
                    <div class="card-header">Reset Password</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success mb-6 shadow-sm">
                                <span>{{ session('status') }}</span>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <label class="floating-label mb-6">
                                <span>Email: </span>
                                <input type="email" name="email" placeholder="mail@example.com" value="{{ old('email') }}"
                                    class="input input-bordered @error('email') input-error @enderror" required autofocus>
                                
                            </label>
                            
                            @error('email')
                                <div class="label -mt-4 mb-2">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror

                            <div class="form-control mt-8">
                                <button type="submit" class="btn btn-primary btn-sm w-full">
                                   Send 
                                </button>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection