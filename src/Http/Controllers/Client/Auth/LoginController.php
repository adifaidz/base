<?php

namespace AdiFaidz\Base\Http\Controllers\Client\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use AdiFaidz\Base\Http\Controllers\Controller;
use AdiFaidz\Base\Traits\LogoutGuardTrait;

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

    use AuthenticatesUsers, LogoutGuardTrait {
        LogoutGuardTrait::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    protected $logoutTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('base_guest:' . config('base.client_guard'), ['except' => 'logout']);

        $this->redirectTo = route('client.home');
        $this->logoutTo   = route('client.login');
    }

    public function showLoginForm()
    {
      return view('base::client.auth.login');
    }

    protected function guard()
    {
        return Auth::guard(config('base.client_guard'));
    }

    protected function broker()
    {
        return Password::broker('users');
    }
}
