<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Helpers;
use  App\Models\DistrictModel;
use  App\Models\ProvinceModel;
use  App\Models\StreetModel;
use  App\Models\WardModel;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $province = ProvinceModel::get();
        return view('home', compact('province'));
    }
    public function getDistrict(Request $request) {
        $district = DistrictModel::where('_province_id', $request->province_id)->get();
        return Helpers::ajaxResult(true, '', $district->toArray());
    }
    public function getWard(Request $request) {
        $ward = WardModel::where([['_district_id', $request->district_id], ['_province_id', $request->province_id]])->get();
        $street = StreetModel::where([['_district_id', $request->district_id], ['_province_id', $request->province_id]])->get();
        return Helpers::ajaxResult(true, '', ['ward' => $ward->toArray(), 'street' =>$street->toArray()]);
    }
}
