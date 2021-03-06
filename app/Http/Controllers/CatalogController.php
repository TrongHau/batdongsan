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
use  App\Models\CategoryModel;
use Illuminate\Support\Facades\Hash;
use  App\User;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleForBuyModel;
use App\Models\TypeModel;
use App\Models\ArticleModel;
use Backpack\NewsCRUD\app\Models\Article;
use App\Models\ArticleTagModel;
use Illuminate\Pagination\LengthAwarePaginator;

class CatalogController extends Controller
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
    public function ArticleForLease_ban_dat(Request $request, $key = '') {
        session_start();
        $titleArticle = TypeModel::where('url', $key ? explode('/', $request->path())[0] : $request->path())->first();
        if(!$titleArticle)
            return view('errors.404');
        $article = ArticleForLeaseModel::selectRaw('*, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, 0, type_vip) as type_vip, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, created_at, created_time_vip) as created_at')->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where('expired_post', '>=', time());
        // hiển thị tất cả
        if($titleArticle->url == 'nha-dat-ban' || $titleArticle->url == 'nha-dat-cho-thue') {
            $article = $article->where('method_article', $titleArticle->name);
        }else{
            $article = $article->where('type_article', $titleArticle->name);
        }
        // search
        if($key)
            $article = $article->where('title', 'like', '%'.$key.'%');
        if($request->sort)
            $_SESSION['order_page_lease'] = $request->sort;
        if(isset($_SESSION['order_page_lease'])) {
            if($_SESSION['order_page_lease'] == 'price_asc'){
                $article = $article->where('price_real', '!=', 0)->orderByRaw('CAST(price_real as unsigned) asc');
            }elseif ($_SESSION['order_page_lease'] == 'price_desc') {
                $article = $article->orderByRaw('CAST(price_real as unsigned) desc');
            }elseif ($_SESSION['order_page_lease'] == 'area_asc') {
                $article = $article->where('area', '!=', 0)->orderBy('area', 'asc');
            }elseif ($_SESSION['order_page_lease'] == 'area_desc') {
                $article = $article->orderBy('area', 'desc');
            }else{
                $article = $article->orderBy('created_at', 'desc');
            }
        }else{
            $article = $article->orderBy('type_vip', 'desc');
            $article = $article->orderBy('created_at', 'desc');
        }
        $article = $article->paginate(PAGING_LIST_ARTICLE_CATALOG);
        return view('v2.catalog.article_for_lease_ban_dat', compact('titleArticle', 'article', 'key'));
    }
    public function ArticleForBuy_cho_thue(Request $request, $key = '') {
        session_start();
        $titleArticle = TypeModel::where('url', $key ? explode('/', $request->path())[0] : $request->path())->first();
        if(!$titleArticle)
            return view('errors.404');
        $article = ArticleForBuyModel::selectRaw('*, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, 0, type_vip) as type_vip, IF(type_vip = 0 || expired_vip <= unix_timestamp(now()) || disabled_vip = 1, created_at, created_time_vip) as created_at')->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])->where('expired_post', '>=', time());
        // hiển thị tất cả
        if($titleArticle->url == 'nha-dat-can-mua' || $titleArticle->url == 'nha-dat-can-thue') {
            $article = $article->where('method_article', $titleArticle->name);
        }else{
            $article = $article->where('type_article', $titleArticle->name);
        }
        // search
        if($key)
            $article = $article->where('title', 'like', '%'.$key.'%');
        if($request->sort)
            $_SESSION['order_page_buy'] = $request->sort;
        if(isset($_SESSION['order_page_buy'])) {
            if($_SESSION['order_page_buy'] == 'price_asc'){
                $article = $article->where('price_real', '!=', 0)->orderByRaw('CAST(price_real as unsigned) asc')->orderBy('ddlPriceType', 'asc');
            }elseif ($_SESSION['order_page_buy'] == 'price_desc') {
                $article = $article->orderByRaw('CAST(price_real as unsigned) desc')->orderBy('ddlPriceType', 'desc');
            }elseif ($_SESSION['order_page_buy'] == 'area_asc') {
                $article = $article->where('area_from', '!=', 0)->orderBy('area_from', 'asc');
            }elseif ($_SESSION['order_page_buy'] == 'area_desc') {
                $article = $article->orderBy('area_from', 'desc');
            }else{
                $article = $article->orderBy('created_at', 'desc');
            }
        }else{
            $article = $article->orderBy('type_vip', 'desc');
            $article = $article->orderBy('created_at', 'desc');
        }
        $article = $article->paginate(PAGING_LIST_ARTICLE_CATALOG);
        return view('v2.catalog.article_for_lease_cho_thue', compact('titleArticle', 'article', 'key'));
    }

    public function Article(Request $request, $prefix = null) {
        if($prefix) {
            $article = ArticleModel::where('slug', $prefix)->where('status', PUBLISHED_ARTICLE)->first();
            if(!$article) {
                return view('errors.404');
            }
            $tags = ArticleTagModel::where('article_id', $article->id)->get();
            $articleRelate = [];
            $tagRelate = '';
//            if(count($tags)) {
//                foreach ($tags as $item) {
//                    $articleTags[] = $item->tag_id;
//                    $tagRelate = $tagRelate . ';' .$item->name;
//                }
//                $tagArticleExsits = ArticleTagModel::whereIn('tag_id', $articleTags)->where('article_id', '!=', $article->id)->limit(2)->get();
//                $arrArticleIds = [];
//                if($tagArticleExsits) {
//                    foreach ($tagArticleExsits as $item) {
//                        $arrArticleIds[] = $item->article_id;
//                    }
//                }
//                $articleRelate = Article::whereIn('id', $arrArticleIds)->where('status', PUBLISHED_ARTICLE)->get();
//            }

            $category = CategoryModel::where('id', $article->category_id)->first();
            $articleRelate = Article::where('category_id', $article->category_id)->where('id', '!=', $article->id)->where('status', PUBLISHED_ARTICLE)->select('id', 'title', 'slug', 'image')->limit(5)->orderBy('id', 'desc')->get();
            $article->where('id', $article->id)->increment('views');

            return view('v2.detail.article_tin_tuc', compact('article', 'articleRelate', 'tagRelate', 'category'));
        } else {
            $category = CategoryModel::where('slug', $prefix ?? $request->path())->first();
            if($category->slug == 'tin-tuc')
                $arrCat[] = 4;
            if(!$category)
                return view('errors.404');
            $arrCat[] = $category->id;
            $categoryChildren = CategoryModel::where('parent_id', $category->id)->get();
            if(count($categoryChildren)) {
                foreach($categoryChildren as $item) {
                    $arrCat[] = $item->id;
                    $categoryChildren2 = CategoryModel::where('parent_id', $item->id)->get();
                    foreach ($categoryChildren2 as $item2) {
                        $arrCat[] = $item2->id;
                    }
                }
            }
            $article = ArticleModel::select('title', 'slug', 'short_content', 'image', 'status', 'featured', 'views', 'created_at', 'category_id')->where('status', PUBLISHED_ARTICLE)->whereIn('category_id', $arrCat)->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE_CATALOG);
            return view('v2.catalog.article_tin_tuc', compact('category', 'article'));
        }

    }
    public function ProjectFeature(Request $request) {
        $category = CategoryModel::where('id', 24)->first();
        $article = ArticleModel::select('title', 'slug', 'short_content', 'image', 'status', 'featured', 'views', 'created_at', 'category_id')->where('status', PUBLISHED_ARTICLE)->where('featured', 1)->where('category_id', 24)->orderBy('created_at', 'desc')->paginate(PAGING_LIST_ARTICLE_CATALOG);
        $category->name = 'Dự Án Nỗi Bật';
        return view('v2.catalog.article_tin_tuc', compact('category', 'article'));
    }
}
