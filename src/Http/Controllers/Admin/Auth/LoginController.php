<?php

namespace AdiFaidz\Base\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use AdiFaidz\Base\Http\Controllers\Controller;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web_admin', ['except' => 'logout']);

        $this->redirectTo = route('admin.home');
    }

    public function showLoginForm()
    {
      return view('base::admin.auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->regenerate();

        return redirect()->route('admin.login');
    }

    protected function guard()
    {
        return Auth::guard('web_admin');
    }
}