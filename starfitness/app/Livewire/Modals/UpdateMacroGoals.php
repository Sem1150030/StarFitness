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

    }

    public function save()
    {

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

