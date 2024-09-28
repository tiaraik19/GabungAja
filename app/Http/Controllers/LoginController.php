<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($user)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/login');
    }
}
