<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.index');
});

Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware(['ensure.auth'])->group(function () {
    Route::get('home/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    //meals
    Route::get('home/meals', [MealController::class, 'index'])->name('meals.index');
    Route::get('home/meals/create', [MealController::class, 'create'])->name('meals.create');
    Route::post('home/meals/create', [MealController::class, 'store'])->name('meals.store');
});
