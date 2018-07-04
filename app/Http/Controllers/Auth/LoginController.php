<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        session()->put('previousUrl',url()->previous());
        return view('user.signin');
    }

    public function redirectTo(){

        return str_replace(url('/'),'',session()->get('previousUrl','/'));
    }

    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->stateless()->user();
        
        $user = User::where(['email' => $userSocial->getEmail()])->first();
 
       if($user){
 
           \Auth::login($user);
 
           return redirect('/');
 
       }else{
 
           return view('user.signup',['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
 
       }
        
    }


}
