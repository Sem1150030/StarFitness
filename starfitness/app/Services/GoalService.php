<?php

namespace App\Services;

use App\Models\Goals;

class GoalService
{
    public function updateGoals($data, ?Goals $goal){
        if($goal->user_id !== auth()->id()){
            return redirect()->route('meals.index')->with('error', 'You are not authorized to update goals.');
        }
        elseif (!$goal){
            $goal = Goals::query()->where('user_id', auth()->id())->firstOrFail();
        }

        $goal->update([
            'kcal_goal' => $data['kcal_goal'],
            'protein_goal' => $data['protein_goal'],
            'carbs_goal' => $data['carbs_goal'],
            'fat_goal' => $data['fat_goal'],
            'is_kcal_max' => $data['is_kcal_max'] ?? false,
            'is_carbs_max' => $data['is_carbs_max'] ?? false,
            'is_fat_max' => $data['is_fat_max'] ?? false,
        ]);

        return $goal;
    }
}
