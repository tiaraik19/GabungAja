<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ResetPassMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ResetPassController extends Controller {
    public function index() {
        return view( 'authentication.resetPass' );
    }

    public function resetPass( Request $request ) {
        $request->validate([
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){
            Mail::to($request->email)->send(new ResetPassMail());
            return back()->with('success', 'Please check your email and reset your password');
        }

        return back()->with('error', 'Email not found!');
    }
}
