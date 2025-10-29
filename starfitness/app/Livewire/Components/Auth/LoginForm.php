<?php

namespace App\Livewire\Components\Auth;

use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;

    public function rules(){
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ];
    }
    public function login(){
        $validatedData = $this->validate();

        try {
             app(\App\Services\AuthService::class)->loginAction($validatedData);
        }
        catch (\Exception $exception){
            session()->flash('error', 'Login failed: ' . $exception->getMessage());
        }

    }
    public function render()
    {
        return view('livewire.components.auth.login-form');
    }
}
