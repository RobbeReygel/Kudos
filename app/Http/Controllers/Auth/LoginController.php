<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook() {
        $fb = Socialite::driver('facebook')->user();

        $user = User::firstOrNew(['id' => $fb->id]);

        $user->avatar = $fb->avatar_original;
        $user->id = $fb->id;
        $user->name = $fb->name;
        $user->gender = $fb->user["gender"];
        $user->save();

        Auth::login(User::where('id', $fb->id)->first());

        return redirect()->route('home');
    }

    public function login() {
        return view('auth.login');
    }
}
