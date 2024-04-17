<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers; // Import AuthenticatesUsers trait
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class LoginController extends Controller
{
    use AuthenticatesUsers; // Use AuthenticatesUsers trait
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
}