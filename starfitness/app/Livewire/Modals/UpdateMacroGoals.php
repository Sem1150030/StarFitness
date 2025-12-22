<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Goals;

class UpdateMacroGoals extends ModalComponent
{
    public $kcal_goal;
    public $protein_goal;
    public $carbs_goal;
    public $fat_goal;
    public $is_kcal_max = true;
    public $is_carbs_max = true;
    public $is_fat_max = true;

    public function mount()
    {
        // Load current user's active goal or set defaults
        $goal = Goals::where('user_id', auth()->id())
            ->where('is_active', true)
            ->first();

        if ($goal) {
            $this->kcal_goal = $goal->kcal_goal;
            $this->protein_goal = $goal->protein_goal;
            $this->carbs_goal = $goal->carbs_goal;
            $this->fat_goal = $goal->fat_goal;
            $this->is_kcal_max = $goal->is_kcal_max;
            $this->is_carbs_max = $goal->is_carbs_max;
            $this->is_fat_max = $goal->is_fat_max;
        } else {
            // Set default values
            $this->kcal_goal = 2000;
            $this->protein_goal = 150;
            $this->carbs_goal = 200;
            $this->fat_goal = 70;
        }
    }

    public function save()
    {
        $this->validate([
            'kcal_goal' => 'required|numeric|min:500|max:10000',
            'protein_goal' => 'required|numeric|min:0|max:1000',
            'carbs_goal' => 'required|numeric|min:0|max:1000',
            'fat_goal' => 'required|numeric|min:0|max:500',
        ]);

        // Deactivate all previous goals
        Goals::where('user_id', auth()->id())
            ->update(['is_active' => false]);

        // Create new goal
        Goals::create([
            'user_id' => auth()->id(),
            'kcal_goal' => $this->kcal_goal,
            'protein_goal' => $this->protein_goal,
            'carbs_goal' => $this->carbs_goal,
            'fat_goal' => $this->fat_goal,
            'is_kcal_max' => $this->is_kcal_max,
            'is_carbs_max' => $this->is_carbs_max,
            'is_fat_max' => $this->is_fat_max,
            'is_active' => true,
        ]);

        session()->flash('success', 'Macro goals updated successfully!');

        $this->closeModal();
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

