<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::redirect('/', '/projects');

// counter to who want enter my web site using url
Route::resource('todos', TodoController::class)->middleware('auth');

Route::resource('projects', ProjectController::class)->middleware('auth');

// Login
Route::view('/login', 'auth.login')->middleware('guest')->name('login');
Route::post('/login', Login::class);

// Register
Route::view('/register', 'auth.register')->middleware('guest')->name('register');
Route::post('/register', Register::class);

// Logout 
Route::post('/logout', Logout::class)->middleware(middleware: 'auth')->name('logout');

// email verify
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/todos');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::view('invite','invite')->name('invite');