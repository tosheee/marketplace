<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
        Session::put('backUrl', URL::previous());
    }

    public function redirectTo()
    {
        return Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => str_random(25),
        ]);
        //$user->roles()->attach(Role::where('name', 'User')->first());
        // Auth::login($user);
        //return redirect()->route('main');

        //$user->notify(new VerifyEmail($user));

        $user->sendVerificationsEmail();

        return $user;
    }
}
