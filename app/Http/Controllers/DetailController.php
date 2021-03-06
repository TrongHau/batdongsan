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
use Backpack\PageManager\app\Models\Page;

class DetailController extends Controller
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
    public function articleForLeaseDetail(Request $request, $position = null, $title = null, $id = null) {
        $article = ArticleForLeaseModel::where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])
            ->where('id', $id)->first();
        if(!$article)
            return view('errors.404');
        $typeOf = 'lease';
        // +1 view
        if(Helpers::sessionCountTimes($article->id, 'article_lease')){
            $article->where('id', $id)->increment('views');
        }
        $relateArticle = ArticleForLeaseModel::selectRaw('*, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, 0, type_vip) as type_vip, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, created_at, created_time_vip) as created_at')->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where([['id','!=' ,$id], ['method_article', $article->method_article], ['province_id', $article->province_id], ['district_id', $article->district_id]])->where('expired_post', '>=', time())->orderBy('type_vip', 'desc')->orderBy('id', 'desc')->limit(8)->get();
        return view('v2.detail.index', compact('article', 'typeOf', 'relateArticle'));
    }
    public function articleForBuyDetail(Request $request, $position = null, $title = null, $id = null) {
        $article = ArticleForBuyModel::where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])
            ->where('id', $id)->first();
        if(!$article)
            return view('errors.404');
        $typeOf = 'buy';
        // +1 view
        if(Helpers::sessionCountTimes($article->id, 'article_lease')){
            $article->where('id', $id)->increment('views');
        }
        $relateArticle = ArticleForBuyModel::selectRaw('*, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, 0, type_vip) as type_vip, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, created_at, created_time_vip) as created_at')->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where([['id','!=' ,$id], ['method_article', $article->method_article], ['province_id', $article->province_id], ['district_id', $article->district_id]])->where('expired_post', '>=', time())->orderBy('type_vip', 'desc')->orderBy('id', 'desc')->limit(8)->get();
        return view('v2.detail.index', compact('article', 'typeOf', 'relateArticle'));
    }
    public function aboutDetail(Request $request) {
        $page = Page::where('slug', $request->path())->first();
        if(!$page)
            return view('errors.404');
        return view('v2.detail.page', compact('page'));
    }
    public function aboutDetailContact(Request $request) {
        $page = Page::where('slug', $request->path())->first();
        if(!$page)
            return view('errors.404');
        return view('v2.detail.contact', compact('page'));
    }
}
