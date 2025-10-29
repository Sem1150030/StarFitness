<?php

namespace App\Livewire\Components\Auth;

use App\Services\AuthService;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;

    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5',
        ];
    }
    public function register(){
        $validatedData = $this->validate();

        try {
            app(AuthService::class)->registerAction($validatedData);

            session()->flash('status', [
                'type' => 'success',
                'message' => 'Registration successful! Welcome aboard.',
            ]);
        }
        catch (\Exception $exception){
            session()->flash('status', [
                'type' => 'error',
                'message' => 'Registration failed: ' . $exception->getMessage(),
            ]);
        }

    }
    public function render()
    {
        return view('livewire.components.auth.register-form');
    }
}
