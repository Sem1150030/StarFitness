<?php

namespace App\Http\Controllers;

use App\Models\DailyLog;
use Illuminate\Http\Request;

class MealController
{
    public function index(){
         $dailyLog = DailyLog::query()
            ->with(['meals', 'goal'])
            ->today(auth()->user())
            ->first();

        return view('home/meals/index', [
            'dailyLog' => $dailyLog
        ]);
    }
}
