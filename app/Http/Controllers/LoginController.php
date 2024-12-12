<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
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
     * Handle login success.
     */
    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
        session()->flash('success', 'Đăng nhập thành công!');
        return redirect()->intended($this->redirectPath());
    }

    /**
     * Handle login failure.
     */
    protected function sendFailedLoginResponse(\Illuminate\Http\Request $request)
    {
        session()->flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'));
    }
}
