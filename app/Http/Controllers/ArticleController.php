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
            ->where('created_at', '>=', date('Y-m-d', strtotime('-2 months')))
            ->where('user_id', Auth::user()->id)
            ->where('status', PUBLISHED_ARTICLE)->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE);
        $list = view('article.item_article_lease', compact('article'));
        return view('article.manage_for_lease', compact('list'));
    }
    public function listArticleForBuy(Request $request)
    {
        $article = ArticleForBuyModel::select(['id', 'title', 'views', 'created_at', 'status', 'aprroval', 'gallery_image', 'note', 'updated_at'])
            ->where('created_at', '>=', date('Y-m-d', strtotime('-2 months')))
            ->where('user_id', Auth::user()->id)
            ->where('status', PUBLISHED_ARTICLE)->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE);
        $list = view('article.item_article_buy', compact('article'));
        return view('article.manage_for_buy', compact('list'));
    }

    public function getListArticleForLease(Request $request) {
        $article = ArticleForLeaseModel::select(['id', 'title', 'views', 'created_at', 'status', 'aprroval', 'gallery_image', 'note', 'updated_at'])
            ->where('user_id', Auth::user()->id);
        if($request->date_from) {
            $article = $article->where('created_at', '>=', date_format(date_create($request->date_from), "Y-m-d"));
        }
        if($request->date_to) {
            $article = $article->where('created_at', '<=', date_format(date_create($request->date_to), "Y-m-d").' 23:59:59');
        }
        if($request->code) {
            $article = $article->where('id', 'like', $request->code);
        }
        if($request->aprroval != -1) {
            $article =  $article->where('aprroval', '=', $request->aprroval);
        }
        $article = $article->where('status', PUBLISHED_ARTICLE)->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE);
        return view('article.item_article_lease', compact('article'));
    }
    public function getListArticleForBuy(Request $request) {
        $article = ArticleForBuyModel::select(['id', 'title', 'views', 'created_at', 'status', 'aprroval', 'gallery_image', 'note', 'updated_at'])
            ->where('user_id', Auth::user()->id);
        if($request->date_from) {
            $article = $article->where('created_at', '>=', date_format(date_create($request->date_from), "Y-m-d"));
        }
        if($request->date_to) {
            $article = $article->where('created_at', '<=', date_format(date_create($request->date_to), "Y-m-d").' 23:59:59');
        }
        if($request->code) {
            $article = $article->where('id', 'like', $request->code);
        }
        if($request->aprroval != -1) {
            $article =  $article->where('aprroval', '=', $request->aprroval);
        }
        $article = $article->where('status', PUBLISHED_ARTICLE)->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE);
        return view('article.item_article_buy', compact('article'));
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
            $article = ArticleForLeaseModel::where('id', $id)->where('user_id', Auth::user()->id)->first();
            if(!$article)
                return view('errors.404');
        }
        return view('article.new_for_lease', compact('article'));
    }
    public function newArticleForBuy(Request $request, $id = null)
    {
        $article = null;
        if($id) {
            $article = ArticleForBuyModel::where('id', $id)->where('user_id', Auth::user()->id)->first();
            if(!$article)
                return view('errors.404');
        }
        return view('article.new_for_buy', compact('article'));
    }

    public function storeArticleForLease(Request $request)
    {
        $this->validate($request, [
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
//            'g-recaptcha-response' => 'required',
        ]);
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
            'area' => $request->area,
            'price' => $request->price,
            'ddlPriceType' => $request->ddlPriceType,
            'price_real' => ($request->price ?? 0) * Helpers::convertCurrency($request->ddlPriceType),
            'content_article' => $request->content_article,
            'facade' => $request->facade,
            'land_width' => $request->land_width,
            'ddlHomeDirection' => $request->ddlHomeDirection,
            'ddlBaconDirection' => $request->ddlBaconDirection,
            'floor' => $request->floor,
            'bed_room' => $request->bed_room,
            'toilet' => $request->toilet,
            'gallery_image' => '',
            'furniture' => $request->furniture,
            'contact_name' => $request->contact_name,
            'contact_address' => $request->contact_address,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
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
            $result = ArticleForLeaseModel::where('user_id', Auth::user()->id)->where('id', $request->id)->first();
            $olDataImgs = (array)json_decode($result->gallery_image);
            $result->update($article);
        }else {
            $article['user_id'] = Auth::user()->id;
            $article['aprroval'] = APPROVAL_ARTICLE_DEFAULT;
            $article['status'] = PUBLISHED_ARTICLE;
            $result = ArticleForLeaseModel::create($article);
        }
        if($request->remove_imgs) {
            $arrImg = explode('|', $request->remove_imgs);
            foreach ($arrImg as $item) {
                Storage::disk('public')->delete(Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).$item);
                Storage::disk('public')->delete(Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).THUMBNAIL_PATH.$item);
            }
        }
        if($request->upload_images) {
            $imgs = [];
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
            $result->gallery_image = json_encode($imgs);
            $result->save();
        }
        if($request->id) {
            return redirect()->route('article.getArticleLease', $request->id)->with('success', 'Sửa tin thành công');
        }else{
            return redirect()->route('article.getArticleLease')->with('success', 'Đăng tin thành công');
        }
    }
    public function storeArticleForBuy(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:99',
            'method_article' => 'required',
            'type_article' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'content_article' => 'required',
            'address' => 'required',
            'contact_phone' => 'required',
            'price_to' => 'max:999999',
            'price_from' => 'max:999999',
//            'g-recaptcha-response' => 'required',
        ]);
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
            'price_real' => ($request->price_to ?? 0) * Helpers::convertCurrency($request->ddlPriceType),
            'content_article' => $request->content_article,
            'contact_name' => $request->contact_name,
            'contact_address' => $request->contact_address,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
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
            $result = ArticleForBuyModel::where('user_id', Auth::user()->id)->where('id', $request->id)->first();
            $olDataImgs = (array)json_decode($result->gallery_image);
            $result->update($article);
        }else {
            $article['user_id'] = Auth::user()->id;
            $article['aprroval'] = APPROVAL_ARTICLE_DEFAULT;
            $article['status'] = PUBLISHED_ARTICLE;
            $result = ArticleForBuyModel::create($article);
        }
        if($request->remove_imgs) {
            $arrImg = explode('|', $request->remove_imgs);
            foreach ($arrImg as $item) {
                Storage::disk('public')->delete(Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_BUY, true).$item);
                Storage::disk('public')->delete(Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_BUY, true).THUMBNAIL_PATH.$item);
            }
        }
        if($request->upload_images) {
            $imgs = [];
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
            $result->gallery_image = json_encode($imgs);
            $result->save();
        }
        if($request->id) {
            return redirect()->route('article.getArticleBuy', $request->id)->with('success', 'Sửa tin thành công');
        }else{
            return redirect()->route('article.getArticleBuy')->with('success', 'Đăng tin thành công');
        }
    }
    public function loadImage(Request $request){
        new UploadHandler();
    }
}