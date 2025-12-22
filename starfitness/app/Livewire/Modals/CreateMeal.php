<?php

namespace App\Livewire\Modals;

use App\Models\DailyLog;
use App\Models\Meal;
use App\Services\MealService;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use mysql_xdevapi\Exception;

class CreateMeal extends ModalComponent
{
    public string $name;
    public DailyLog $log;

    public function mount(){

    }

    public function rules(){
        return [
            'name' => 'required|string|max:30',
        ];
    }

    public function render()
    {
        return view('livewire.modals.create-meal');
    }

    public function submit(MealService $mealService){
        try {
            $this->validate();

            $mealService->createMeal([
                'name' => $this->name,
            ], $this->log);

            return redirect()->route('meals.index')->with('success', 'Meal: ' . $this->name . ' created successfully.');
        }catch (Exception $exception){
            return redirect()->route('meals.index')->with('error', $exception->getMessage());
        }

    }

}
