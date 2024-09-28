<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ForgetPassController extends Controller {
    public function index() {
        return view( 'authentication.forgetPass' );
    }

    public function forgetPass( Request $request ) {
        $check = $request->validate([
            'email' => 'required',
        ]);

        $validasi = $request->validate( [
            'newPassword' => 'required|min:8|max:12',
            'confirmNewPassword' => 'required|min:8|max:12',
        ] );

        $validasi[ 'newPassword' ] = bcrypt( $validasi[ 'newPassword' ] );
        $validasi[ 'confirmNewPassword' ] = bcrypt( $validasi[ 'confirmNewPassword' ] );
       
        $user = User::where('email', $request->email)->first();
        if($user){
        $user->password = $request->newPassword;
        $user->confirmPassword = $request->confirmNewPassword;
        $user->save();
        return redirect( '/login' )->with( 'success', 'Password changed successfully!' );
        }
        return back()->with('error', 'Email not found!');
    }
}
