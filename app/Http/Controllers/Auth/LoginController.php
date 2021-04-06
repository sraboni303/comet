<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


    /**
     *  Login using email or phone_number or username
     */
    public function username()
    {
        $login_info = request()->input('login_info');
        $phone_number = substr($login_info, 0, 4);

        if(filter_var($login_info, FILTER_VALIDATE_EMAIL)){
            $name = 'email';
        }elseif($phone_number == 8801){
            $name = 'phone_number';
        }else{
            $name = 'username';
        }

        request()->merge([$name => $login_info]);
        return $name;
    }


    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut($request)
    {
        return redirect('/login');
    }
}
