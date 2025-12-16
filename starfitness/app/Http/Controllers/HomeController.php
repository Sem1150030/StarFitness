<?php

namespace App\Http\Controllers;

use App\Models\DailyLog;
use Illuminate\Http\Request;

class HomeController
{
    public function dashboard(){

        $dailyLog = DailyLog::query()
            ->with(['meals', 'goal'])
            ->today(auth()->user())
            ->first();

        return view('home/dashboard', [
            'dailyLog' => $dailyLog
        ]);
    }
}
