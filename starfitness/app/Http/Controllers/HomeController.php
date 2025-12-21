<?php

namespace App\Http\Controllers;

use App\Models\DailyLog;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;

class HomeController
{
    public function dashboard(){
        $dailyLog = DailyLog::query()
            ->with(['meals.mealItems', 'goal'])
            ->today(auth()->user())
            ->first();

        return view('home/dashboard', [
            'dailyLog' => $dailyLog
        ]);
    }
}
