@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Reset password</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            
                            <input type="hidden" name="token" value="{{ $token }}">

                            <label class="floating-label mb-6">
                                <span>Email</span>
                                <input type="email" name="email" placeholder="mail@example.com" value="{{ $email ?? old('email') }}"
                                    class="input input-bordered @error('email') input-error @enderror" required autofocus>
                                
                            </label>
                            @error('email')
                                <div class="label -mt-4 mb-2">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror

                            <label class="floating-label mb-6">
                                 <span>Password</span>
                                <input type="password" name="password" placeholder="••••••••"
                                    class="input input-bordered @error('password') input-error @enderror" required>
                                
                            </label>
                            @error('password')
                                <div class="label -mt-4 mb-2">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror

                            <label class="floating-label mb-6">
                                <span>Confirm Password</span>
                                <input type="password" name="password_confirmation" placeholder="••••••••"
                                    class="input input-bordered" required>
                                
                            </label>

                            <div class="form-control mt-8">
                                <button type="submit" class="btn btn-primary btn-sm w-full">
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