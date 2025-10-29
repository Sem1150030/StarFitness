<?php
namespace App\Services;

use App\Models\User;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class AuthService
{
    public function registerAction($data){
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            Auth::login($user);

            return redirect('/')->with('success', 'Welcome ' . $user->name);
        }
        catch (\Exception $exception){
            throw new InvalidArgumentException('Could not register user: ' . $exception->getMessage());
        }
    }

    public function loginAction(array $credentials)
    {
        if (Auth::attempt($credentials, true)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Logged in successfully');
        }

        return redirect(route('auth.login'))->with('error', 'Invalid credentials provided');
    }

    public function logoutAction(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out');
    }
}
