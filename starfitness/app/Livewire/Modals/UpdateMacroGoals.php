<?php

namespace App\Livewire\Modals;

use App\Services\GoalService;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Goals;

class UpdateMacroGoals extends ModalComponent
{
    public $kcal_goal;
    public $protein_goal;
    public $carbs_goal;
    public $fat_goal;
    public $is_kcal_max;
    public $is_carbs_max;
    public $is_fat_max;
    public Goals $goal;
    public function mount()
    {
        $this->goal = Goals::where('user_id', auth()->id())
            ->where('is_active', true)
            ->first();

        if ($this->goal) {
            $this->kcal_goal = $this->goal->kcal_goal;
            $this->protein_goal = $this->goal->protein_goal;
            $this->carbs_goal = $this->goal->carbs_goal;
            $this->fat_goal = $this->goal->fat_goal;
            $this->is_kcal_max = $this->goal->is_kcal_max;
            $this->is_carbs_max = $this->goal->is_carbs_max;
            $this->is_fat_max = $this->goal->is_fat_max;
        }
    }

    public function rules(){
        return [
            'kcal_goal' => 'required|integer|min:0',
            'protein_goal' => 'required|integer|min:0',
            'carbs_goal' => 'required|integer|min:0',
            'fat_goal' => 'required|integer|min:0',
            'is_kcal_max' => 'boolean',
            'is_carbs_max' => 'boolean',
            'is_fat_max' => 'boolean',
        ];
    }

    public function save(GoalService $goalService)
    {
        $goalService->updateGoals($this->validate(), $this->goal);

        return redirect()->route('meals.index')->with('success', 'Macro goals updated successfully.');
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }


    public function render()
    {
        return view('livewire.modals.update-macro-goals');
    }
}

