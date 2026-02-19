<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InviteTodoController;
use App\Http\Controllers\InviteProjectController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



/// reset password routes
Route::middleware('guest')->group(function () {

    ///  1
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    ///  2
    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->name('password.email');

    ///  3 this route responsible for redirect user from email to reset password
    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    ///  4
    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PasswordReset
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');

});



/// main routes
Route::redirect('/', destination: '/projects');
Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('projects', ProjectController::class);
    Route::resource('projects.todos', controller: TodoController::class);

    Route::resource('projects.invites_project', InviteProjectController::class);

    Route::resource('projects.todos.invites_todo', InviteTodoController::class);
});



// Login
Route::view('/login', 'auth.login')->middleware('guest')->name('login');
Route::post('/login', Login::class);

// Register
Route::view('/register', 'auth.register')->middleware('guest')->name('register');
Route::post('/register', Register::class);

// Logout 
Route::post(uri: '/logout', Logout::class)->middleware(middleware: 'auth')->name('logout');

// 1  email verify
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// 2  mark Email As Verified
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/projects');
})->middleware(['auth', 'signed'])->name('verification.verify');

// 3 resending verification email 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
