<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/store';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        Session::put('backUrl', URL::previous());
    }

    public function redirectTo()
    {
        return Session::get('backUrl') ? Session::get('backUrl') : $this->redirectTo;
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            #'provider' => $provider,
            #'provider_id' => $user->id
        ]);
    }
}
