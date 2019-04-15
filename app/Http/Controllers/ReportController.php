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
use  App\Models\ReportModel;
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

class ReportController extends Controller
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
    public function newArticleForLeaseForBuy(Request $request)
    {
        if(!$request->email)
            return Helpers::ajaxResult(false, 'Vui lòng điền email.', ['txtErrorSenderEmail']);
        if(!$request->content_report)
            return Helpers::ajaxResult(false, 'Bạn chưa nhập nội dung', ['txtErrorContent']);
        if(!$request->reason)
            return Helpers::ajaxResult(false, 'Bạn chưa chọn lý do', ['ddlErrorReasons']);
        if(!$request->captcha)
            return Helpers::ajaxResult(false, 'Bạn chưa xác nhận mã an toàn', ['errorCaptcha']);
        ReportModel::create([
            'user_id' => Auth::user()->id ?? 0,
            'name' => $request->name,
            'email' => $request->email,
            'reason_report' => $request->reason,
            'content' => $request->content_report,
            'method' => $request->method_report,
            'article_id' => $request->id_article,
        ]);
        return Helpers::ajaxResult(true, 'Cảm ơn bạn đã gửi thông báo về tin rao này.');

    }

}