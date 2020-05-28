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
use App\Models\ArticleModel;
use Jenssegers\Agent\Agent;
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
        $Agent = new Agent();
        $page_per = PAGING_LIST_FEATURE_HOME;
        if($Agent->isMobile()) {
            $page_per = PAGING_LIST_FEATURE_HOME / 2;
        }
//        $articleForLease = ArticleForLeaseModel::select(['id', 'prefix_url', 'title', 'views', 'created_at', 'status', 'aprroval', 'gallery_image', 'note', 'updated_at', 'project', 'province_id', 'province', 'district_id', 'district', 'address', 'ddlPriceType', 'price_real', 'price', 'area'])
        $articleForLease = ArticleForLeaseModel::selectRaw('id, method_article, "lease" as method_table, featured, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, price, area, null as price_from, null as price_to, null as area_from, null as area_to, created_time_vip, type_vip')
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where('disabled_vip', '=', 0)->where('type_vip', '!=', 0)->where('expired_vip', '>=', date('Y/m/d', time()));
        $articleForLease2 = ArticleForBuyModel::selectRaw('id, method_article, "buy" as method_table, featured, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, null as price, null as area, price_from, price_to, area_from, area_to, created_time_vip, type_vip')
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where('disabled_vip', '=', 0)->where('type_vip', '!=', 0)->where('expired_vip', '>=', date('Y/m/d', time()));
        $articleForLease->union($articleForLease2)->limit($page_per)->orderBy('type_vip', 'desc')->orderBy('created_time_vip', 'desc');
        $articleForLease = $articleForLease->get();
//        dd($articleForLease->toArray());

        $articleFeature= ArticleForLeaseModel::selectRaw('id, method_article, "lease" as method_table, featured, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, price, area, null as price_from, null as price_to, null as area_from, null as area_to, created_time_vip, type_vip')
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where('featured', 1);
        $articleFeature2 = ArticleForBuyModel::selectRaw('id, method_article, "buy" as method_table, featured, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, null as price, null as area, price_from, price_to, area_from, area_to, created_time_vip, type_vip')
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where('featured', 1);
        $articleFeature->union($articleFeature2)->limit($page_per)->orderBy('created_at', 'desc');
        $articleFeature = $articleFeature->get();

        $articlePartner = ArticleModel::select('title', 'slug', 'short_content', 'image', 'status', 'featured', 'views', 'created_at', 'category_id')->where('status', PUBLISHED_ARTICLE)->where('category_id', 23)->orderBy('created_at', 'desc')->limit(PAGING_LIST_PARTNER_HOME)->get()->toArray();


        return view('v2.home', compact('articleForLease', 'articleFeature', 'articlePartner'));
    }
    public function ajaxArticleHome(Request $request) {
        $Agent = new Agent();
        $page_per = PAGING_LIST_FEATURE_HOME;
        if($Agent->isMobile()) {
            $page_per = PAGING_LIST_FEATURE_HOME / 2;
        }

        $articleForLease = ArticleForLeaseModel::selectRaw('id, method_article, featured, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, price, area, null as price_from, null as price_to, null as area_from, null as area_to, created_time_vip, type_vip')
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where('type_vip', 1)->where('expired_vip', '>=', date('Y/m/d', time()));
        $articleForLease2 = ArticleForBuyModel::selectRaw('id, method_article, featured, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, null as price, null as area, price_from, price_to, area_from, area_to, created_time_vip, type_vip')
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where('type_vip', 1)->where('expired_vip', '>=', date('Y/m/d', time()));
        $articleForLease->union($articleForLease2)->offset($page_per * (($request->page ?? 0) - 1))->limit($page_per)->orderBy('type_vip', 'desc')->orderBy('created_time_vip', 'desc');
        $articleForLease = $articleForLease->get();
        return view('v2.catalog.element_ajax_home', compact('articleForLease'));
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
