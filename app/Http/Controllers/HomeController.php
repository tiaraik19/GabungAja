<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function landing()
    {
        return view('main.landing');
    }
    
    public function index()
    {
        return view('main.home');
    }
}
