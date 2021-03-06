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
use Backpack\NewsCRUD\app\Models\Article;
use Backpack\NewsCRUD\app\Models\Category;
use Storage;
use Illuminate\Filesystem\Filesystem;
use DB;

class SyncController extends Controller
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
    public function Province(Request $request, $position = null, $title = null, $id = null) {
        $province = ProvinceModel::get()->toArray();
        file_put_contents(resource_path().'/views/cache/province.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $province;
    
$province = ' . var_export($province, true) . ';
?>');

        return response(['Ok']);
    }
    public function articleForBuyDetail(Request $request, $position = null, $title = null, $id = null) {

    }
    public function homeTinTuc() {
        $category = Category::get();
        $result = [];
        foreach($category as $item) {
            $article = Article::select('category_id', 'title', 'slug', 'views', 'image')->where('status', PUBLISHED_ARTICLE)->where('category_id', $item->id)->orderBy('id', 'desc')->limit(8)->get();
            $result[$item->id] = [];
            foreach($article as $key => $item2) {
                $result[$item->id][$key] = $item2->toArray();
                $result[$item->id][$key]['slug_category'] = $item->slug;
                $result[$item->id][$key]['category_parent_id'] = $item->parent_id;
            }
        }

        // lời khuyên
        $loikhuyen = [];
        $i = 0;
        $article = Article::select('category_id', 'title', 'slug', 'views', 'image')->where('status', PUBLISHED_ARTICLE)->whereIn('category_id', [16, 17, 18, 19, 20, 21])->orderBy('id', 'desc')->limit(8)->get();
        foreach($article as $key => $item2) {
            $loikhuyen[$i] = $item2->toArray();
            $loikhuyen[$i]['slug_category'] = $item->slug;
            $loikhuyen[$i]['category_parent_id'] = $item->parent_id;
            $i++;
        }
        // tư vấn luật
        $tuvanluat = [];
        $i = 0;
        $article = Article::select('category_id', 'title', 'slug', 'views', 'image')->where('status', PUBLISHED_ARTICLE)->whereIn('category_id', [9, 10, 11, 12, 13, 14, 15])->orderBy('id', 'desc')->limit(8)->get();
        foreach($article as $key => $item2) {
            $tuvanluat[$key] = $item2->toArray();
            $tuvanluat[$key]['slug_category'] = $item->slug;
            $tuvanluat[$key]['category_parent_id'] = $item->parent_id;
            $i++;
        }
        // tất cả tin mới
        $all_tin_tuc_moi = [];
        $i = 0;
        $article = Article::select('category_id', 'title', 'slug', 'views', 'image')->where('status', PUBLISHED_ARTICLE)->whereIn('category_id', [4, 5, 6, 7, 8])->orderBy('id', 'desc')->limit(8)->get();
        foreach($article as $key => $item2) {
            $all_tin_tuc_moi[$key] = $item2->toArray();
            $all_tin_tuc_moi[$key]['slug_category'] = $item->slug;
            $all_tin_tuc_moi[$key]['category_parent_id'] = $item->parent_id;
            $i++;
        }
        // tin nỗi bật
        $noibat = [];
        $article = Article::select('category_id', 'title', 'slug', 'views', 'image', 'short_content')->where('status', PUBLISHED_ARTICLE)->where('featured', 1)->orderBy('id', 'desc')->limit(15)->get();
        foreach($article as $key => $item) {
            $noibat[$key] = $item->toArray();
            $category = $item->category->first();
            $noibat[$key]['slug_category'] = $category->slug;
            $noibat[$key]['category_parent_id'] = $category->parent_id;
        }
        file_put_contents(resource_path().'/views/cache/tintuc.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $tintuc;
global $loikhuyen;
global $tuvanluat;
    
$tintuc = ' . var_export($result, true) . ';
$loikhuyen = ' . var_export($loikhuyen, true) . ';
$tuvanluat = ' . var_export($tuvanluat, true) . ';
?>');

        file_put_contents(resource_path().'/views/cache/tin_noi_bat.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $noibat;
$noibat = ' . var_export($noibat, true) . ';
?>');

        file_put_contents(resource_path().'/views/cache/all_tin_tuc_moi.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $all_tin_tuc_moi;
$all_tin_tuc_moi = ' . var_export($noibat, true) . ';
?>');

        return response(['Ok']);
    }
    public function deleteFolderTemp() {
        $files = Storage::allFiles('public/temp/');
        if($files) {
            foreach ($files as $item) {
                Storage::delete($item);
            }
        }
    }
    public function articleLeaseProvince() {
        $articleForLease = ArticleForLeaseModel::select('province', 'province_id', DB::raw('count(*) as total'))
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])
            ->where('province_id', '>', 0)
            ->where('expired_post', '>=', time())
            ->groupBy('province', 'province_id')->orderBy('total', 'desc')
            ->limit(20)->get()->toArray();
        file_put_contents(resource_path().'/views/cache/location_province_article_lease.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $location_province_article_lease;
$location_province_article_lease = ' . var_export($articleForLease, true) . ';
?>');

        $articleForLease = ArticleForLeaseModel::select('province_id', 'district', 'district_id', DB::raw('count(*) as total'))
            ->where([['status', PUBLISHED_ARTICLE], ['aprroval', APPROVAL_ARTICLE_PUBLIC]])
            ->where('district_id', '>', 0)
            ->where('expired_post', '>=', time())
            ->groupBy('province_id', 'district', 'district_id')->orderBy('total', 'desc')
            ->get()->toArray();
        $articleForLease_ = [];
        foreach ($articleForLease as $item) {
            $articleForLease_[$item['province_id']][] = [
                'district' => $item['district'],
                'district_id' => $item['district_id'],
                'total' => $item['total'],
            ];
        }


        file_put_contents(resource_path().'/views/cache/location_district_article_lease.blade.php',
            '<?php 
if ( !ENV(\'IN_PHPBB\') )
{
    die(\'Hacking attempt\');
    exit;
}
global $location_district_article_lease;
$location_district_article_lease = ' . var_export($articleForLease_, true) . ';
?>');

        return response(['Ok']);

    }
}
