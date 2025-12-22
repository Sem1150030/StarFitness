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

    public function create(){
        return view('home/meals/create', []);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'kcal_total' => 'required|integer|min:0',
            'protein_total' => 'required|integer|min:0',
            'carbs_total' => 'required|integer|min:0',
            'fat_total' => 'required|integer|min:0',
        ]);
    }
}
