<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Helpers;
use App\Library\UploadHandler;
use Illuminate\Support\Facades\Auth;
use  App\Models\DistrictModel;
use  App\Models\ProvinceModel;
use  App\Models\StreetModel;
use  App\Models\WardModel;
use Illuminate\Support\Facades\Hash;
use  App\User;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleForBuyModel;
use App\Models\TypeModel;

class SearchController extends Controller
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
    public function advance(Request $request, $method = -1, $province_id = -1, $district_id = -1, $ward_id = -1, $street_id = -1, $area = -1, $price = -1, $bed_room = -1, $toilet = -1, $ddlHomeDirection = -1, $key = '') {
        session_start();
        if($method == 0) {
            $titleArticle = null;
        }else{
            $titleArticle = TypeModel::where('url', $method)->first();
        }
        $type = 'ban_dat';
        // hiển thị tất cả các loại
        if($method == 0) {
            $article = ArticleForLeaseModel::where('status', PUBLISHED_ARTICLE);
        }elseif($method == 'nha-dat-ban') {
            $article = ArticleForLeaseModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Nhà đất bán');
        }elseif($method == 'nha-dat-cho-thue') {
            $article = ArticleForLeaseModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Nhà đất cho thuê');
        }elseif($method == 'nha-dat-can-mua') {
            $type = 'cho_thue';
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Nhà đất cần mua');
        }elseif($method == 'nha-dat-can-thue') {
            $type = 'cho_thue';
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Nhà đất cần thuê');
        }elseif($method == 'ban-can-ho-chung-cu') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Bán căn hộ chung cư');
        }elseif($method == 'ban-nha-rieng') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Bán nhà riêng');
        }elseif($method == 'ban-biet-thu-lien-ke') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Bán biệt thự, liền kề');
        }elseif($method == 'ban-nha-mat-pho') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Bán nhà mặt phố');
        }elseif($method == 'ban-dat-nen-du-an') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Bán đất nền dự án');
        }elseif($method == 'ban-dat') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Bán đất');
        }elseif($method == 'ban-trang-trai-khu-nghi-duong') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Bán trang trại, khu nghỉ dưỡng');
        }elseif($method == 'ban-kho-nha-xuong') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Bán kho, nhà xưởng');
        }elseif($method == 'ban-loai-bat-dong-san-khac') {
            $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->where('method_article', 'Bán loại bất động sản khác');
        }
        $article = $article->where('expired_post', '>=', time());
        // hiển thị tất cả các loại
        if($method == 'tat-ca-nha-ban') {
            $article = ArticleForLeaseModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->whereIn('type_article', ['Bán căn hộ chung cư', 'Bán nhà riêng', 'Bán biệt thự, liền kề', 'Bán nhà mặt phố']);
        }elseif($method == 'tat-ca-dat-ban') {
            $article = ArticleForLeaseModel::where('status', PUBLISHED_ARTICLE);
            $article = $article->whereIn('type_article', ['Bán đất nền dự án', 'Bán đất', 'Bán trang trại, khu nghỉ dưỡng', 'Bán kho, nhà xưởng']);
        }
        if($district_id > 0) {
            $article = $article->where('district_id', $district_id);
            $district = DistrictModel::where('id', $district_id)->first();
            if(!$district)
                return view('errors.404');
            $local = $district->_name;
        }
        if($province_id > 0) {
            $article = $article->where('province_id', $province_id);
            $province = ProvinceModel::where('id', $province_id)->first();
            if(!$province)
                return view('errors.404');
            $local = $province->_name;
        }
        if($ward_id > 0) {
            $article = $article->where('ward_id', $ward_id);
        }
        if($street_id > 0) {
            $article = $article->where('street_id', $street_id);
        }
        if($area >= 0) {
            $where_area = 'area';
            if($article->getModel()->getTable() == 'articles_for_buy') {
                $where_area = 'area_from';
            }
            if($area == 0) {
                $article = $article->where($where_area, 0);
            }elseif ($area == 1) {
                $article = $article->where($where_area, '<=', '30')->where($where_area, '!=',0);
            }elseif ($area == 2) {
                $article = $article->where($where_area, '>=', '30')->where($where_area, '<=', '50');
            }elseif ($area == 3) {
                $article = $article->where($where_area, '>=', '50')->where($where_area, '<=', '80');
            }elseif ($area == 4) {
                $article = $article->where($where_area, '>=', '80')->where($where_area, '<=', '100');
            }elseif ($area == 5) {
                $article = $article->where($where_area, '>=', '100')->where($where_area, '<=', '150');
            }elseif ($area == 6) {
                $article = $article->where($where_area, '>=', '150')->where($where_area, '<=', '200');
            }elseif ($area == 7) {
                $article = $article->where($where_area, '>=', '200')->where($where_area, '<=', '250');
            }elseif ($area == 8) {
                $article = $article->where($where_area, '>=', '250')->where($where_area, '<=', '300');
            }elseif ($area == 9) {
                $article = $article->where($where_area, '>=', '300')->where($where_area, '<=', '500');
            }elseif ($area == 10) {
                $article = $article->where($where_area, '>=', '500');
            }
        }
        if($price >= 0) {
            if($price == 0) {
                $article = $article->where('price_real', 0);
            }elseif ($price == 1) {
                $article = $article->where('price_real', '<=', '500000000')->where('price_real', '!=',0);
            }elseif ($price == 2) {
                $article = $article->where('price_real', '>=', '500000000')->where('price_real', '<=', '800000000');
            }elseif ($price == 3) {
                $article = $article->where('price_real', '>=', '800000000')->where('price_real', '<=', '1000000000');
            }elseif ($price == 4) {
                $article = $article->where('price_real', '>=', '1000000000')->where('price_real', '<=', '2000000000');
            }elseif ($price == 5) {
                $article = $article->where('price_real', '>=', '2000000000')->where('price_real', '<=', '3000000000');
            }elseif ($price == 6) {
                $article = $article->where('price_real', '>=', '3000000000')->where('price_real', '<=', '5000000000');
            }elseif ($price == 7) {
                $article = $article->where('price_real', '>=', '5000000000')->where('price_real', '<=', '7000000000');
            }elseif ($price == 8) {
                $article = $article->where('price_real', '>=', '7000000000')->where('price_real', '<=', '9000000000');
            }elseif ($price == 9) {
                $article = $article->where('price_real', '>=', '10000000000')->where('price_real', '<=', '20000000000');
            }elseif ($price == 10) {
                $article = $article->where('price_real', '>=', '20000000000')->where('price_real', '<=', '30000000000');
            }elseif ($price == 11) {
                $article = $article->where('price_real', '>=', '30000000000');
            }
        }
        if($bed_room >= 0) {
            if($bed_room == 0) {
                $article = $article->where('bed_room', 0);
            }elseif ($bed_room == 1) {
                $article = $article->where('bed_room', '>=', '1');
            }elseif ($bed_room == 2) {
                $article = $article->where('bed_room', '>=', '2');
            }elseif ($bed_room == 3) {
                $article = $article->where('bed_room', '>=', '3');
            }elseif ($bed_room == 4) {
                $article = $article->where('bed_room', '>=', '4');
            }elseif ($bed_room == 5) {
                $article = $article->where('bed_room', '>=', '5');
            }
        }
        if($toilet >= 0) {
            if($toilet == 0) {
                $article = $article->where('toilet', 0);
            }elseif ($toilet == 1) {
                $article = $article->where('toilet', '>=', '1');
            }elseif ($toilet == 2) {
                $article = $article->where('toilet', '>=', '2');
            }elseif ($toilet == 3) {
                $article = $article->where('toilet', '>=', '3');
            }elseif ($toilet == 4) {
                $article = $article->where('toilet', '>=', '4');
            }elseif ($toilet == 5) {
                $article = $article->where('toilet', '>=', '5');
            }
        }
        if($ddlHomeDirection != -1) {
            $article = $article->where('ddl_bacon_direction', $ddlHomeDirection);
        }
        if($key) {
            $article = $article->where(function ($query) use ($key) {
                $query->where('title', 'like', '%'.$key.'%')
                    ->orWhere('id', 'like', $key);
            });
        }
        $article = $article->selectRaw('*, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, 0, type_vip) as type_vip, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, created_at, created_time_vip) as created_at');
        if($request->sort)
            $_SESSION['order_page_lease'] = $request->sort;
        if(isset($_SESSION['order_page_lease'])) {
            if($_SESSION['order_page_lease'] == 'price_asc'){
                $article = $article->where('price_real', '!=', 0)->orderByRaw('CAST(price_real as unsigned) asc');
            }elseif ($_SESSION['order_page_lease'] == 'price_desc') {
                $article = $article->orderByRaw('CAST(price_real as unsigned) desc');
            }elseif ($_SESSION['order_page_lease'] == 'area_asc' && $article->getModel()->getTable() == 'articles_for_lease') {
                $article = $article->where('area', '!=', 0)->orderBy('area', 'asc');
            }elseif ($_SESSION['order_page_lease'] == 'area_desc' && $article->getModel()->getTable() == 'articles_for_lease') {
                $article = $article->orderBy('area', 'desc');
            }else{
                $article = $article->orderBy('created_at', 'desc');
            }
        }else{
            $article = $article->orderBy('type_vip', 'desc');
            $article = $article->orderBy('created_at', 'desc');
        }
        $article = $article->paginate(PAGING_LIST_ARTICLE_CATALOG);
        return view('v2.catalog.article_for_lease_'.$type, compact('titleArticle', 'article', 'key', 'method', 'province_id', 'district_id', 'ward_id', 'street_id', 'area', 'price', 'bed_room', 'toilet', 'ddlHomeDirection', 'local'));
    }
}
