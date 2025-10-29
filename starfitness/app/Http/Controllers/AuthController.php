<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController
{
    public function register()
    {
        return view('auth.register');
    }
}

