<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.index');
});

Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware(['ensure.auth'])->group(function () {
    Route::get('home/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});
