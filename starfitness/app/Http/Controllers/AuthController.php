<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController
{
    public function register()
    {
        if(auth()->check()){
            return redirect('/')->with('info', 'You are already logged in.');
        }

        return view('auth.register');
    }
}

