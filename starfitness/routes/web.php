<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.index');
});

Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
