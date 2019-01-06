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
        $article = ArticleForLeaseModel::where('status', PUBLISHED_ARTICLE)
            ->where('id', $id)->first();
        if(!$article)
            return view('errors.404');
        $province = ProvinceModel::get();
        $typeOf = 'lease';
        return view('detail.index', compact('province', 'article', 'typeOf'));
    }
    public function articleForBuyDetail(Request $request, $position = null, $title = null, $id = null) {
        $article = ArticleForBuyModel::where('status', PUBLISHED_ARTICLE)
            ->where('id', $id)->first();
        if(!$article)
            return view('errors.404');
        $province = ProvinceModel::get();
        $typeOf = 'buy';
        return view('detail.index', compact('province', 'article', 'typeOf'));
    }
}
