<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

    public function google()
    {

        return Socialite::driver('google')
            ->scopes(['https://www.googleapis.com/auth/contacts'])
            ->scopes(['https://www.googleapis.com/auth/contacts.other.readonly'])
            ->redirect();
    }

    public function googleRedirect()
    {
        $user = Socialite::driver('google')->user();
        // Helpers::ContactGrouplist($user->token);

        //getting the token
        $access_token = $user->token;

        // dd($access_token);

        $user = User::firstorCreate([
            'email' => $user->email,

        ], [
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)),
        ]);

        $newuser = User::where('email', $user->email)->update(array('access_token' => $access_token));

        // $newuser = User::create([
        //     'name' => $user->name,
        //     'email' => $user->email,
        //     'access_token' => $access_token,
        //     'refreshtoken' => $user->refreshToken,
        //     'password' => encrypt('my-google'),
        // ]);

        Auth::login($user);

        // dd(Auth::id());

        return redirect('/contactgroup');
    }
}
