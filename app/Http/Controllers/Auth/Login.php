<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   

        $credentials = $request->validate(['email' => 'required|email|', 'password' => 'required']);
        
        // check if email and password is correct
        if (Auth::attempt($credentials, $request->boolean('remember'))) {

           // regenerate session id for security reason
           $request->session()->regenerate();

           // intended is to redirect user to last page before he login
           return redirect()->intended('/')->with('success','Welcome back!');

        }

        // back to login with error and the old value of email
        return back()->withErrors(['email'=>'The provided credentials do not match our records.'])->onlyInput('email');
    }
}
