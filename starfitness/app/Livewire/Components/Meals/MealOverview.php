<?php

namespace App\Livewire\Components\Meals;

use App\Models\DailyLog;
use App\Models\Meal;
use Livewire\Attributes\Computed;
use Livewire\Component;

class MealOverview extends Component
{

    public DailyLog $log;

    public function render()
    {
        return view('livewire.components.meals.meal-overview');
    }

}
