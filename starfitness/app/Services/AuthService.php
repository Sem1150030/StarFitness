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
}
