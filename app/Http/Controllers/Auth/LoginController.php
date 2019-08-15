<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Services\UserServices;
use JWTAuth, Auth;

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

    private $userServices;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
        $this->middleware('guest')->except('logout');
    }

    /**
     * [attemptLogin this will update the JWT Token on USER end]
     * @param  Request $request [Email, Password]
     * @return void         
     */
    public function attemptLogin(Request $request)
    {
        $credentials = \Request::only('email', 'password');
        
        if (Auth::attempt($credentials)) {

            //this will validate user to JWT to get Auth TOKEN
            $token = JWTAuth::attempt($credentials);
            $this->userServices->updateUser(["jwt_token" => $token]);

        }
    }
}
