<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');


    }

     public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return $this->loggedOut($request);
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('admin.login'));
    }

    // ゲストユーザー用のユーザーIDを定数として定義
    private const GUEST_ADMIN_ID =5;

    // ゲストログイン処理
    public function guestLogin()
    {
        // id=1 のゲストユーザー情報がDBに存在すれば、ゲストログインする
        if (Auth::loginUsingId(self::GUEST_ADMIN_ID)) {
            return redirect('admin/home');
        }
        return redirect('/');
    }
}
