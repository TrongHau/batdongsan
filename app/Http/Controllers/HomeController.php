<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Helpers;
use  App\Models\DistrictModel;
use  App\Models\ProvinceModel;
use  App\Models\StreetModel;
use  App\Models\WardModel;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleForBuyModel;
use Illuminate\Support\Facades\Auth;
use DB;

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

//        $articleForLease = ArticleForLeaseModel::select(['id', 'prefix_url', 'title', 'views', 'created_at', 'status', 'aprroval', 'gallery_image', 'note', 'updated_at', 'project', 'province_id', 'province', 'district_id', 'district', 'address', 'ddlPriceType', 'price_real', 'price', 'area'])
        $articleForLease = ArticleForLeaseModel::selectRaw('id, method_article, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, price, area, null as price_from, null as price_to, null as area_from, null as area_to')
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]]);
        $articleForLease2 = ArticleForBuyModel::selectRaw('id, method_article, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, null as price, null as area, price_from, price_to, area_from, area_to')
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]]);
//        dd($articleForLease2->orderBy('created_at', 'desc')->get()->toArray());
        $articleForLease->union($articleForLease2)->limit(PAGING_LIST_ARTICLE_HOME)->orderBy('created_at', 'desc');
        $articleForLease = $articleForLease->get();
//        dd($articleForLease->toArray());
        return view('home', compact('articleForLease'));
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
