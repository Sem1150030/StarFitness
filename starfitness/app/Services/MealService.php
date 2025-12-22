<?php

namespace App\Services;

use App\Models\DailyLog;

class MealService
{

    public function createMeal($data, DailyLog $dailyLog){
        if($dailyLog->user_id !== auth()->id()){
            return redirect()->route('meals.index')->with('error', 'You are not authorized to add meals.');
        }

        $meal = $dailyLog->meals()->create([
            'name' => $data['name'],
            'kcal_total' => 0,
            'protein_total' => 0,
            'carbs_total' => 0,
            'fat_total' => 0,
            'user_id' => auth()->id(),
        ]);

        return $meal;
    }

}
