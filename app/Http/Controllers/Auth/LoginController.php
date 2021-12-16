<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, string $provider)
    {
        // $providerUser = Socialite::driver($provider)->stateless()->user();
        $providerUser = Socialite::driver($provider)->user();

        // $user = User::where('email', $providerUser->getEmail())->first();

        if($provider === 'google') {
            $user = User::where('email', $providerUser->getEmail())->first();
        } elseif($provider === 'twitter') {
            $user = User::where('twitter_id', $providerUser->getId())->first();
        }

        if ($user) {
            $this->guard()->login($user, true);
            return $this->sendLoginResponse($request);
        }

        // return redirect()->route('register.{provider}', [
        //     'provider' => $provider,
        //     'email' => $providerUser->getEmail(),
        //     'token' => $providerUser->token,
        // ]);

        if($provider === 'google') {
            return redirect()->route('register.{provider}', [
                'provider' => $provider,
                'email' => $providerUser->getEmail(),
                'token' => $providerUser->token,
            ]);
        } elseif($provider === 'twitter') {
            return redirect()->route('register.{provider}', [
                'provider' => $provider,
                // 'email' => $providerUser->getEmail(),
                'twitter_id' => $providerUser->getId(),
                'token' => $providerUser->token,
                'tokenSecret' => $providerUser->tokenSecret,
            ]);
        }

    }
}
