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
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use Session;
use Mail;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
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
    }
    public function listArticleForLease(Request $request)
    {
        $article = ArticleForLeaseModel::select(['id', 'title', 'views', 'created_at', 'status', 'aprroval', 'gallery_image', 'note', 'updated_at'])
            ->where('status', PUBLISHED_ARTICLE)
            ->where('created_at', '>=', date('Y-m-d', strtotime('-2 months')))
            ->where('user_id', Auth::user()->id)
//            ->where('status', PUBLISHED_ARTICLE)
            ->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE);
        $list = view('v2.article.item_article_lease', compact('article'));
        return view('v2.article.manage_for_lease', compact('list'));
    }
    public function listArticleForBuy(Request $request)
    {
        $article = ArticleForBuyModel::select(['id', 'title', 'views', 'created_at', 'status', 'aprroval', 'gallery_image', 'note', 'updated_at'])
            ->where('status', PUBLISHED_ARTICLE)
            ->where('created_at', '>=', date('Y-m-d', strtotime('-2 months')))
            ->where('user_id', Auth::user()->id)
//            ->where('status', PUBLISHED_ARTICLE)
            ->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE);
        $list = view('v2.article.item_article_buy', compact('article'));
        return view('v2.article.manage_for_buy', compact('list'));
    }
    public function listDrafArticle(Request $request)
    {
        $page = $request->page ?? 1;
        $articleForLease = ArticleForLeaseModel::selectRaw('id, method_article, type_article,prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, price, area, null as price_from, null as price_to, null as area_from, null as area_to, \'lease\' as typeOf')
            ->where('status', DRAFT_ARTICLE)
            ->where('created_at', '>=', date('Y-m-d', strtotime('-2 months')))
            ->where('user_id', Auth::user()->id);
        $articleForBuy = ArticleForBuyModel::selectRaw('id, method_article, type_article, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, null as price, null as area, price_from, price_to, area_from, area_to, \'buy\' as typeOf')
            ->where('status', DRAFT_ARTICLE)
            ->where('created_at', '>=', date('Y-m-d', strtotime('-2 months')))
            ->where('user_id', Auth::user()->id);
        $article = $articleForLease->union($articleForBuy)->orderBy('created_at', 'desc')->get();
        $slice = array_slice($article->toArray(), PAGING_LIST_ARTICLE * ($page - 1), PAGING_LIST_ARTICLE + 1);
        $article = new \Illuminate\Pagination\Paginator($slice, PAGING_LIST_ARTICLE);

        $list = view('v2.article.item_article_draf', compact('article'));
        return view('v2.article.manage_for_draf', compact('list'));
    }

    public function getListArticleForLease(Request $request) {
        $article = ArticleForLeaseModel::select(['id', 'title', 'views', 'created_at', 'status', 'aprroval', 'gallery_image', 'note', 'updated_at'])
            ->where('user_id', Auth::user()->id);

        if($request->code) {
            $article = $article->where('id', 'like', $request->code);
        }else{
            if($request->date_from) {
                $article = $article->where('created_at', '>=', date_format(date_create($request->date_from), "Y-m-d"));
            }
            if($request->date_to) {
                $article = $article->where('created_at', '<=', date_format(date_create($request->date_to), "Y-m-d").' 23:59:59');
            }
        }
        if($request->aprroval != -1) {
            $article =  $article->where('aprroval', '=', $request->aprroval);
        }
        $article = $article->where('status', PUBLISHED_ARTICLE)->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE);
        return view('v2.article.item_article_lease', compact('article'));
    }
    public function getListArticleForBuy(Request $request) {
        $article = ArticleForBuyModel::select(['id', 'title', 'views', 'created_at', 'status', 'aprroval', 'gallery_image', 'note', 'updated_at'])
            ->where('user_id', Auth::user()->id);

        if($request->code) {
            $article = $article->where('id', 'like', $request->code);
        }else{
            if($request->date_from) {
                $article = $article->where('created_at', '>=', date_format(date_create($request->date_from), "Y-m-d"));
            }
            if($request->date_to) {
                $article = $article->where('created_at', '<=', date_format(date_create($request->date_to), "Y-m-d").' 23:59:59');
            }
        }
        if($request->aprroval != -1) {
            $article =  $article->where('aprroval', '=', $request->aprroval);
        }
        $article = $article->where('status', PUBLISHED_ARTICLE)->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE);
        return view('v2.article.item_article_buy', compact('article'));
    }
    public function getListArticleForDraf(Request $request) {
        $page = $request->page ?? 1;
        $articleForLease = ArticleForLeaseModel::selectRaw('id, method_article, type_article,prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, price, area, null as price_from, null as price_to, null as area_from, null as area_to, \'lease\' as typeOf')
            ->where('status', DRAFT_ARTICLE)
            ->where('user_id', Auth::user()->id);
        $articleForBuy = ArticleForBuyModel::selectRaw('id, method_article, type_article, prefix_url, title, views, created_at, status, aprroval, gallery_image, note, updated_at, project, province_id, province, district_id, district, address, ddlPriceType, price_real, null as price, null as area, price_from, price_to, area_from, area_to, \'buy\' as typeOf')
            ->where('status', DRAFT_ARTICLE)
            ->where('user_id', Auth::user()->id);
        if($request->code) {
            $articleForLease = $articleForLease->where('id', 'like', $request->code);
            $articleForBuy = $articleForBuy->where('id', 'like', $request->code);
        }else{
            if($request->date_from) {
                $articleForLease = $articleForLease->where('created_at', '>=', date_format(date_create($request->date_from), "Y-m-d"));
                $articleForBuy = $articleForBuy->where('created_at', '>=', date_format(date_create($request->date_from), "Y-m-d"));
            }
            if($request->date_to) {
                $articleForLease = $articleForLease->where('created_at', '<=', date_format(date_create($request->date_to), "Y-m-d").' 23:59:59');
                $articleForBuy = $articleForBuy->where('created_at', '<=', date_format(date_create($request->date_to), "Y-m-d").' 23:59:59');
            }
        }
        if($request->aprroval != -1) {
            $articleForLease =  $articleForLease->where('aprroval', '=', $request->aprroval);
            $articleForBuy =  $articleForBuy->where('aprroval', '=', $request->aprroval);
        }
        $article = $articleForLease->union($articleForBuy)->orderBy('updated_at', 'desc')->get();
        $slice = array_slice($article->toArray(), PAGING_LIST_ARTICLE * ($page - 1), PAGING_LIST_ARTICLE + 1);
        $article = new \Illuminate\Pagination\Paginator($slice, PAGING_LIST_ARTICLE);
        return view('v2.article.item_article_draf', compact('article'));
    }
    public function deleteArticle(Request $request) {
        if($request->type == 1) {
            // delete for lease
            $result = ArticleForLeaseModel::where('id', $request->code)->where('user_id', Auth::user()->id)->first();
        }else{
            // delete for buy
            $result = ArticleForBuyModel::where('id', $request->code)->where('user_id', Auth::user()->id)->first();
        }
        if($result) {
            if($result->gallery_image) {
                foreach (json_decode($result->gallery_image) as $item) {
                    Storage::disk('public')->delete(Helpers::file_path($result->id, $request->type == 1 ? SOURCE_DATA_ARTICLE_LEASE : SOURCE_DATA_ARTICLE_BUY, true).$item);
                    Storage::disk('public')->delete(Helpers::file_path($result->id, $request->type == 1 ? SOURCE_DATA_ARTICLE_LEASE : SOURCE_DATA_ARTICLE_BUY, true).THUMBNAIL_PATH.$item);
                }
            }
            $result = $result->delete();
        }
        Helpers::ajaxResult($result ? true : false, $result ? 'Xóa tin thành công' : 'Xóa tin thất bại', null);
    }

    public function newArticleForLease(Request $request, $id = null)
    {
        $article = null;
        if($id) {
            if(Auth::user()->rolesBDSRoleName() == ROLE_NAME_ADMIN) {
                // kiểm tra admin truy cập trực tiếp
                $article = ArticleForLeaseModel::where('id', $id)->first();
            }else {
                $article = ArticleForLeaseModel::where('id', $id)->where('user_id', Auth::user()->id)->first();
            }
            if(!$article)
                return view('errors.404');
        }

        return view('v2.article.new_for_lease', compact('article'));
    }
    public function newArticleForBuy(Request $request, $id = null)
    {
        $article = null;
        if($id) {
            if(Auth::user()->rolesBDSRoleName() == ROLE_NAME_ADMIN) {
                // kiểm tra admin truy cập trực tiếp
                $article = ArticleForBuyModel::where('id', $id)->first();
            }else {
                $article = ArticleForBuyModel::where('id', $id)->where('user_id', Auth::user()->id)->first();
            }
            if(!$article)
                return view('errors.404');
        }
       
        return view('v2.article.new_for_buy', compact('article'));
    }

    public function newGuestArticleForLease(Request $request) {
        if(Auth::check()) {
            return redirect()->route('article.getArticleLease');
        }
        return view('v2.article.new_for_lease_guest');
    }
    public function newGuestArticleForBuy(Request $request) {
        if(Auth::check()) {
            return redirect()->route('article.getArticleBuy');
        }
        return view('v2.article.new_for_buy_guest');
    }

    public function storeArticleForLease(Request $request)
    {
        $mes = '';
        $typeAuthGuest = '';
        $excep = [
            'title' => 'required|max:99',
            'method_article' => 'required',
            'type_article' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'content_article' => 'required',
            'address' => 'required',
            'contact_phone' => 'required',
            'price' => 'max:999999',
            'bed_room' => 'max:99',
            'toilet' => 'max:99',
            'g-recaptcha-response' => 'required',
        ];
        session_start();
        if(!Auth::check()) {
            if(!isset($_SESSION['verify_phone']) || !$_SESSION['verify_phone']) {
                $excep['contact_phone'] = 'required';
            }else{
                Input::merge(['contact_phone' => $_SESSION['verify_phone']]);
                $typeAuthGuest = 'guest.';
            }
        }else{
            if(!$request->id) {
                Input::merge(['contact_phone' => Auth::user()->phone]);
            }else{
                unset($excep['contact_phone']);
            }
        }
        $this->validate($request, $excep);
        $article = [
            'title' => $request->title,
            'method_article' => $request->method_article,
            'type_article' => $request->type_article,
            'province_id' => $request->province_id,
            'province' => $request->province_id ? ProvinceModel::find($request->province_id)->_name : '',
            'district_id' => $request->district_id,
            'district' => ($request->district_id && $request->province_id) ? DistrictModel::where('id', $request->district_id)->where('_province_id', $request->province_id)->first()->_name : '',
            'ward_id' => $request->ward_id,
            'ward' => ($request->ward_id && $request->district_id && $request->province_id) ? WardModel::where('id', $request->ward_id)->where('_province_id', $request->province_id)->where('_district_id', $request->district_id)->first()->_name : '',
            'street_id' => $request->street_id,
            'street' => ($request->street_id && $request->district_id && $request->province_id) ? StreetModel::where('id', $request->street_id)->where('_province_id', $request->province_id)->where('_district_id', $request->district_id)->first()->_name : '',
            'address' => $request->address,
            'project' => $request->project,
            'area' => $request->area ?? 0,
            'price' => $request->price,
            'ddlPriceType' => $request->ddlPriceType,
            'price_real' => ($request->price ?? 0) * Helpers::convertCurrency($request->ddlPriceType),
            'content_article' => $request->content_article,
            'facade' => $request->facade,
            'land_width' => $request->land_width,
            'ddl_home_direction' => $request->ddl_home_direction,
            'ddl_bacon_direction' => $request->ddl_bacon_direction,
            'floor' => $request->floor,
            'bed_room' => $request->bed_room,
            'toilet' => $request->toilet,
            'gallery_image' => '',
            'furniture' => $request->furniture,
            'contact_name' => $request->contact_name,
            'contact_address' => $request->contact_address,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'status' => $request->submit_type == 'draf' ? DRAFT_ARTICLE : PUBLISHED_ARTICLE,
            'prefix_url' =>  strtolower(Helpers::rawTiengVietUrl($request->type_article.($request->project ? '-du-an-'.$request->project : '').'-'.explode(',', $request->address)[0]).'/'.Helpers::rawTiengVietUrl($request->title))
        ];
        $article[ 'method_article_url'] = Helpers::rawTiengVietUrl($article['method_article']);
        $article[ 'type_article_url'] = Helpers::rawTiengVietUrl($article['type_article']);
        $article[ 'province_url'] = Helpers::rawTiengVietUrl($article['province']);
        $article[ 'district_url'] = Helpers::rawTiengVietUrl($article['district']);
        $article[ 'ward_url'] = Helpers::rawTiengVietUrl($article['ward']);
        $article[ 'street_url'] = Helpers::rawTiengVietUrl($article['street']);
        $olDataImgs = [];
        if($request->id) {
            if(!backpack_user()->hasRole('admin')) {
                unset($article['contact_phone']);
            }
            if(Auth::user()->rolesBDSRoleName() == ROLE_NAME_ADMIN) {
                // kiểm tra admin truy cập trực tiếp
                $result = ArticleForLeaseModel::where('id', $request->id)->first();
            }else {
                $result = ArticleForLeaseModel::where('id', $request->id)->where('user_id', Auth::user()->id)->first();
            }
            if(!$result)
                return view('errors.404');
            $olDataImgs = (array)json_decode($result->gallery_image);
            if($article['status'] != DRAFT_ARTICLE) {
                $user = Auth::user();
                if($user->point_current < POINT_NEW_ARTICLE_FOR_LEASE) {
                    $mes = 'Số điểm hiện tại không đủ để đăng tin, tin của bạn sẽ được lưu vào tin nháp. Vui lòng liên hệ bộ phận hotro@batdongsan.ooo để tiếp tục đăng tin, cảm ơn';
                    $article['status'] = DRAFT_ARTICLE;
                }else {
                    if($result->point < 0) {
                        $user->aritcle_lease_total = $user->aritcle_lease_total + 1;
                        $user->point_current = $user->point_current - POINT_NEW_ARTICLE_FOR_LEASE;
                        $article['point'] = POINT_NEW_ARTICLE_FOR_LEASE;
                        $user->save();
                    }
                }
            }
            $result->update($article);
        }else {
            $article['user_id'] = Auth::user()->id ?? 0;
            $article['aprroval'] = APPROVAL_ARTICLE_DEFAULT;
            $article['start_news'] = time();
            $article['expired_post'] =  strtotime(TIME_EXPIRY_POST_ARTICLE);
            if($article['status'] != DRAFT_ARTICLE && Auth::check()) {
                $user = Auth::user();
                if($user->point_current < POINT_NEW_ARTICLE_FOR_LEASE) {
                    $mes = 'Số điểm hiện tại không đủ để đăng tin, tin của bạn sẽ được lưu vào tin nháp. Vui lòng liên hệ bộ phận hotro@batdongsan.ooo để tiếp tục đăng tin, cảm ơn';
                    $article['status'] = DRAFT_ARTICLE;
                }else {
                    $user->aritcle_lease_total = $user->aritcle_lease_total + 1;
                    $user->point_current = $user->point_current - POINT_NEW_ARTICLE_FOR_LEASE;
                    $article['point'] = POINT_NEW_ARTICLE_FOR_LEASE;
                    $user->save();
                }
            }
            $result = ArticleForLeaseModel::create($article);
            $data = [
                'article' => $result,
                'prefix_admin_edit' => 'article_for_lease',
            ];
            Mail::send('emails.new_article_lease_buy', $data, function($message) use ($result)
            {
                $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                //env('MAIL_USERNAME_NEW_ARTICLE')
                $message->to(env('MAIL_USERNAME_NEW_ARTICLE'), env('MAIL_USERNAME'))->subject('Tin rao này cần được kiểm duyệt');
            });
        }
        if($request->remove_imgs) {
            $arrImg = explode('|', $request->remove_imgs);
            foreach ($arrImg as $item) {
                Storage::disk('public')->delete(Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).$item);
                Storage::disk('public')->delete(Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).THUMBNAIL_PATH.$item);
            }
        }
        $imgs = [];
        if($request->upload_images != null && $request->upload_images != '') {
            foreach($request->upload_images as $item) {
                if(!in_array($item, $olDataImgs)) {
                    $fileName = $result->id.'-'.$item;
                    Storage::disk('public')->move(SOURCE_DATA_TEMP.$item, Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).$fileName);
                    Storage::disk('public')->move(SOURCE_DATA_THUMBNAIL.$item, Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).THUMBNAIL_PATH.$fileName);
                }else{
                    $fileName = $item;
                }
                $imgs[] = $fileName;
            }
        }
        $result->gallery_image = $imgs ? json_encode($imgs) : null;
        $result->save();

        if($request->id) {
            return redirect()->route($typeAuthGuest.'article.getArticleLease', $request->id)->with('success', $mes ? $mes : 'Sửa tin thành công');
        }else{
            return redirect()->route($typeAuthGuest.'article.getArticleLease')->with('success', $mes ? $mes : 'Đăng tin thành công');
        }
    }
    public function storeArticleForBuy(Request $request)
    {
        session_start();
        $typeAuthGuest = '';
        $excep = [
            'title' => 'required|max:99',
            'method_article' => 'required',
            'type_article' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'content_article' => 'required',
            'address' => 'required',
            'contact_phone' => 'required',
            'price' => 'max:999999',
            'bed_room' => 'max:99',
            'toilet' => 'max:99',
            'g-recaptcha-response' => 'required',
        ];
        if(!Auth::check()) {
            if(!isset($_SESSION['verify_phone']) || !$_SESSION['verify_phone']) {
                $excep['contact_phone'] = 'required';
            }else{
                Input::merge(['contact_phone' => $_SESSION['verify_phone']]);
                $typeAuthGuest = 'guest.';
            }
        }else{
            if(!$request->id) {
                Input::merge(['contact_phone' => Auth::user()->phone]);
            }else{
                unset($excep['contact_phone']);
            }
        }
        $this->validate($request, $excep);
        $mes = '';
        $article = [
            'title' => $request->title,
            'method_article' => $request->method_article,
            'type_article' => $request->type_article,
            'province_id' => $request->province_id,
            'province' => $request->province_id ? ProvinceModel::find($request->province_id)->_name : '',
            'district_id' => $request->district_id,
            'district' => ($request->district_id && $request->province_id) ? DistrictModel::where('id', $request->district_id)->where('_province_id', $request->province_id)->first()->_name : '',
            'ward_id' => $request->ward_id,
            'ward' => ($request->ward_id && $request->district_id && $request->province_id) ? WardModel::where('id', $request->ward_id)->where('_province_id', $request->province_id)->where('_district_id', $request->district_id)->first()->_name : '',
            'street_id' => $request->street_id,
            'street' => ($request->street_id && $request->district_id && $request->province_id) ? StreetModel::where('id', $request->street_id)->where('_province_id', $request->province_id)->where('_district_id', $request->district_id)->first()->_name : '',
            'address' => $request->address,
            'project' => $request->project,
            'area_from' => $request->area_from,
            'area_to' => $request->area_to,
            'price_from' => $request->price_from,
            'price_to' => $request->price_to,
            'ddlPriceType' => $request->ddlPriceType,
            'price_real' => (($request->price_from && $request->price_to) ? $request->price_to : 0) * Helpers::convertCurrency($request->ddlPriceType),
            'content_article' => $request->content_article,
            'contact_name' => $request->contact_name,
            'contact_address' => $request->contact_address,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'status' => $request->submit_type == 'draf' ? DRAFT_ARTICLE : PUBLISHED_ARTICLE,
            'prefix_url' =>  strtolower(Helpers::rawTiengVietUrl($request->type_article.($request->project ? '-du-an-'.$request->project : '').'-'.explode(',', $request->address)[0]).'/'.Helpers::rawTiengVietUrl($request->title))
        ];
        $article[ 'method_article_url'] = Helpers::rawTiengVietUrl($article['method_article']);
        $article[ 'type_article_url'] = Helpers::rawTiengVietUrl($article['type_article']);
        $article[ 'province_url'] = Helpers::rawTiengVietUrl($article['province']);
        $article[ 'district_url'] = Helpers::rawTiengVietUrl($article['district']);
        $article[ 'ward_url'] = Helpers::rawTiengVietUrl($article['ward']);
        $article[ 'street_url'] = Helpers::rawTiengVietUrl($article['street']);
        $olDataImgs = [];
        if($request->id) {
            if(!backpack_user()->hasRole('admin')) {
                unset($article['contact_phone']);
            }
            if(Auth::user()->rolesBDSRoleName() == ROLE_NAME_ADMIN) {
                // kiểm tra admin truy cập trực tiếp
                $result = ArticleForBuyModel::where('id', $request->id)->first();
            }else {
                $result = ArticleForBuyModel::where('id', $request->id)->where('user_id', Auth::user()->id)->first();
            }
            if(!$result)
                return view('errors.404');
            $olDataImgs = (array)json_decode($result->gallery_image);
            if($article['status'] != DRAFT_ARTICLE) {
                $user = Auth::user();
                if($user->point_current < POINT_NEW_ARTICLE_FOR_LEASE) {
                    $mes = 'Số điểm hiện tại không đủ để đăng tin, tin của bạn sẽ được lưu vào tin nháp. Vui lòng liên hệ bộ phận hotro@batdongsan.ooo để tiếp tục đăng tin, cảm ơn';
                    $article['status'] = DRAFT_ARTICLE;
                }else {
                    if($result->point < 0) {
                        $user->aritcle_buy_total = $user->aritcle_buy_total + 1;
                        $user->point_current = $user->point_current - POINT_NEW_ARTICLE_FOR_BUY;
                        $article['point'] = POINT_NEW_ARTICLE_FOR_BUY;
                        $user->save();
                    }
                }
            }
            $result->update($article);
        }else {
            $article['user_id'] = Auth::user()->id ?? 0;
            $article['aprroval'] = APPROVAL_ARTICLE_DEFAULT;
            $article['start_news'] = time();
            $article['expired_post'] =  strtotime(TIME_EXPIRY_POST_ARTICLE);
            if($article['status'] != DRAFT_ARTICLE && Auth::check()) {
                $user = Auth::user();
                if($user->point_current < POINT_NEW_ARTICLE_FOR_BUY) {
                    $mes = 'Số điểm hiện tại không đủ để đăng tin, tin của bạn sẽ được lưu vào tin nháp. Vui lòng liên hệ bộ phận hotro@batdongsan.ooo để tiếp tục đăng tin, cảm ơn';
                    $article['status'] = DRAFT_ARTICLE;
                }else {
                    $user->aritcle_buy_total = $user->aritcle_buy_total + 1;
                    $user->point_current = $user->point_current - POINT_NEW_ARTICLE_FOR_BUY;
                    $article['point'] = POINT_NEW_ARTICLE_FOR_BUY;
                    $user->save();
                }
            }
            $result = ArticleForBuyModel::create($article);
            $data = [
                'article' => $result,
                'prefix_admin_edit' => 'article_for_buy',
            ];
            Mail::send('emails.new_article_lease_buy', $data, function($message) use ($result)
            {
                $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                $message->to(env('MAIL_USERNAME_NEW_ARTICLE'), env('MAIL_USERNAME'))->subject('Tin rao cần được kiểm duyệt');
            });
        }
        if($request->remove_imgs) {
            $arrImg = explode('|', $request->remove_imgs);
            foreach ($arrImg as $item) {
                Storage::disk('public')->delete(Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_BUY, true).$item);
                Storage::disk('public')->delete(Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_BUY, true).THUMBNAIL_PATH.$item);
            }
        }
        $imgs = [];
        if($request->upload_images != null && $request->upload_images != '') {
            foreach($request->upload_images as $item) {
                if(!in_array($item, $olDataImgs)) {
                    $fileName = $result->id.'-'.$item;
                    Storage::disk('public')->move(SOURCE_DATA_TEMP.$item, Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_BUY, true).$fileName);
                    Storage::disk('public')->move(SOURCE_DATA_THUMBNAIL.$item, Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_BUY, true).THUMBNAIL_PATH.$fileName);
                }else{
                    $fileName = $item;
                }
                $imgs[] = $fileName;
            }
        }
        $result->gallery_image = $imgs ? json_encode($imgs) : null;
        $result->save();
        if($request->id) {
            return redirect()->route($typeAuthGuest.'article.getArticleBuy', $request->id)->with('success', $mes ? $mes : 'Sửa tin thành công');
        }else{
            return redirect()->route($typeAuthGuest.'article.getArticleBuy')->with('success', $mes ? $mes : 'Đăng tin thành công');
        }
    }
    public function loadImage(Request $request){
        new UploadHandler();
    }
}