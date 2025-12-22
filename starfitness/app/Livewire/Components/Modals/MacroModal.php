<?php

namespace App\Livewire\Components\Modals;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Auth;
use App\Models\Goals;

class MacroModal extends ModalComponent
{
    public $kcal_goal;
    public $protein_goal;
    public $carbs_goal;
    public $fat_goal;

    public function rules()
    {
        return [
            'kcal_goal' => 'required|integer|min:0',
            'protein_goal' => 'required|integer|min:0',
            'carbs_goal' => 'required|integer|min:0',
            'fat_goal' => 'required|integer|min:0',
        ];
    }

    public function save()
    {
        $this->validate();

        Goals::create([
            'user_id' => Auth::id(),
            'kcal_goal' => $this->kcal_goal,
            'protein_goal' => $this->protein_goal,
            'carbs_goal' => $this->carbs_goal,
            'fat_goal' => $this->fat_goal,
            'is_active' => true,
        ]);

        session()->flash('success', 'Macro goals saved successfully!');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.components.modals.macro-modal');
    }
}
