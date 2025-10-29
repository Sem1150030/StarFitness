<?php

namespace App\Livewire\Components\Navigation;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TopNavigation extends Component
{
    public $user = null;

    protected $listeners = ['userLoggedIn' => '$refresh', 'userLoggedOut' => '$refresh'];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.components.navigation.top-navigation');
    }
}
