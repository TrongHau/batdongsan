<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['errors' => [
            'email' => trans($response)
        ]], 422);
    }
    protected function sendResetLinkResponse($response)
    {
        return response()->json(['status' => [
            'email' => 'Kiểm tra hộp thư email của bạn.'
        ]], 200);
    }
}
