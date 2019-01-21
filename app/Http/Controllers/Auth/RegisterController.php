<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\MailTokenModel;
use Illuminate\Support\Str;
use Session;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/thong-tin-ca-nhan/thay-doi-ca-nhan';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => DEACTIVE_USER,
            'user_type' => DEFAULT_USER_TYPE,
            'point_current' => DEFAULT_POINT_LOGIN_NEW_USER,
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
        $token = MailTokenModel::create([
            'email' => $data['email'],
            'token' => Str::random(60),
            'created_at' => date('Y-m-d H:m', time())
        ]);
        $data = [
            'user' => $user,
            'token' => $token,
        ];
        Mail::send('emails.register', $data, function($message) use ($user)
        {
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
            $message->to($user->email, $user->name)->subject('Chúc mừng bạn đăng ký thành công batdongosan.company');
        });
        Session::flash('success', 'Bạn đã đăng ký thành viên thành công. Vui lòng kiểm tra email để kích hoạt tài khoản của bạn');
        return $user;
    }
}
