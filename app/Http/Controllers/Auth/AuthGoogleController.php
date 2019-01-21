<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/14/2018
 * Time: 2:50 PM
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserSocialModel;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Session;

class AuthGoogleController extends Controller
{

    /**
     * Redirect the user to the Github authentication page
     *
     * @return Response
     */
    public function redirectToProvider() {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Github
     *
     * @return Response
     */
    public function handleProviderCallback() {
        // Get github's user infomation
        $user = Socialite::driver('facebook')->user();
        // Create user
        $email = ($user->getEmail() ? $user->getEmail() : $user->getId() . '@batdongsan_company.com');
        $existUser = User::where('app_facebook', '=', $user->getId())->orWhere('email', '=', $email)->first();
        if(!$existUser) {
            $existUser = User::create([
                'name' => $user->getName(),
                'email' => $email,
                'user_active' => ACTIVE_USER,
                'user_avatar' => $user->avatar_original,
                'app_google' => $user->getId(),
                'status' => ACTIVE_USER,
                'phone' => ''
            ]);
        }else{
            $existUser = $existUser;
        }
        Auth::login($existUser);
        return redirect('/');
    }
}