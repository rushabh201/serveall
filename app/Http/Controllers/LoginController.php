<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
       /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function __invoke(Request $request)
    // public function authenticate(Request $request)
    {
        return view('components.auth.register');
        // $credentials = $request->only('email', 'password');
 
        // if (Auth::attempt($credentials)) {
        //     // Authentication passed...
        //     return redirect()->intended('register');
        // }
    }

    public function authenticate()
    // public function authenticate(Request $request)
    {
        return view('components.auth.login');
        // $credentials = $request->only('email', 'password');
 
        // if (Auth::attempt($credentials)) {
        //     // Authentication passed...
        //     return redirect()->intended('register');
        // }
    }
}
