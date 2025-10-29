<?php

namespace App\Livewire\Components\Navigation;

use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TopNavigation extends Component
{
    public $user = null;
    public $dropdownOpen = false;

    protected $listeners = ['userLoggedIn' => '$refresh', 'userLoggedOut' => '$refresh'];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function toggleDropdown()
    {
        $this->dropdownOpen = !$this->dropdownOpen;
    }

    public function closeDropdown()
    {
        $this->dropdownOpen = false;
    }

    public function logout()
    {
        try{
            app(AuthService::class)->logoutAction();
        }
        catch (\Exception $exception){
            session()->flash('error', 'Logout failed: ' . $exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.components.navigation.top-navigation');
    }
}
