<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;

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
        session_start();
        $_SESSION['verify_phone'] = '';
        $this->middleware('guest')->except('logout');
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        if($request->ajax()) {
            return response()->json(['success' => true], 200);
        }else{
            return redirect('/');
        }
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = Auth::getUser();
        $errors = [];
        if($user) {
            if($user->user_active == BANNED_USER) {
                $errors = ['email' => 'Tài Khoản của bạn đang bị khóa'];
            }
        }else{
            $errors = ['password' => 'Mật khẩu không chính xác.'];
        }
        if ($request->expectsJson()) {
            return response()->json(['errors' => $errors], 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
