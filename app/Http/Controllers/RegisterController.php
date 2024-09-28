<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller {
    public function index() {
        return view( 'authentication.register' );
    }

    public function register( Request $request ) {
        $validasi = $request->validate( [
            'fullName' => 'required|min:5|max:40',
            'username' => 'required|unique:users|min:5|max:10',
            'email' => 'required|unique:users|email:dns',
            'phoneNumber' => 'required|numeric|digits:10',
            'password' => 'required|min:8|max:12',
            'confirmPassword' => 'required|min:8|max:12',
        ] );

        $validasi[ 'password' ] = bcrypt( $validasi[ 'password' ] );
        $validasi[ 'confirmPassword' ] = bcrypt( $validasi[ 'confirmPassword' ] );

        User::create( $validasi );
        return redirect( '/login' )->with( 'success', 'Account has been created successfully!' );
    }
}
