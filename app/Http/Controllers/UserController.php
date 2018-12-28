<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/21/2018
 * Time: 3:33 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Helpers;
use Illuminate\Support\Facades\Auth;
use  App\Models\DistrictModel;
use  App\Models\ProvinceModel;
use  App\Models\StreetModel;
use  App\Models\WardModel;
use Illuminate\Support\Facades\Hash;
use  App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('user.index');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
    public function changeProfile(Request $request) {
        $province = ProvinceModel::get();
        return view('user.change_profile', compact('province'));
    }
    public function storeProfile(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:50',
            'phone' => 'required',
        ]);
        $profile = [
            'name' => $request->name,
            'nick_name' => $request->nick_name,
            'birth_day' => date("Y/m/d", strtotime($request->input('birth_day'))),
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'ward_id' => $request->ward_id,
            'street_id' => $request->street_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'tax_code' => $request->tax_code,
            'skype' => $request->skype,
            'zalo' => $request->zalo,
            'viber' => $request->viber,
            'facebook' => $request->facebook,

        ];
        $result = User::where('id', Auth::user()->id)->update($profile);
        return redirect()->route('user.changeProfile')->with('success', 'Cập nhật thành công');

    }
    public function storeAvatar(Request $request) {
        if($request->input('avatar')){
            $path = Helpers::file_path(Auth::user()->id, STORAGE_AVATAR_PATH, true);
            $fileNameAvatar = Helpers::saveBase64Image($request->input('avatar'), $path, Auth::user()->id, 'png');
            $user = Auth::user();
            $user->avatar = $fileNameAvatar;
            $user->save();
            return Helpers::ajaxResult(true, 'Cập nhật ảnh đại diện thành công.', null);
        }
    }
    public function changePassword(Request $request) {
        return view('user.change_password');
    }
    public function storePassword(Request $request) {
        $this->validate($request, [
            'current_password' => 'required|max:255|min:6',
            'password' => 'required|max:255|min:6',
            'repassword' => 'required|max:255|min:6|same:password',
        ]);
        if($request->input('password') && $request->input('current_password')) {
            if(Hash::check($request->input('current_password'), Auth::User()->password))
            {
                $user = Auth::user();
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect()->route('user.changePassword')->with('success', 'Cập nhật mật khẩu thành công.');
            }
        }
        return redirect()->route('user.changePassword')->with('error', 'Xác nhận mật khẩu không chính xác');
    }
}
