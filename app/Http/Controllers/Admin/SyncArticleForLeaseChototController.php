<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;
use Artisan;
use Storage;
use App\Models\TypeModel;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Auth;
use App\Library\Helpers;
use App\Models\CategoryModel;
use App\Models\SyncArticleForLeaseModel;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleModel;
use App\Models\DistrictModel;
use App\Models\ProvinceModel;
use App\Models\WardModel;
use App\Models\StreetModel;

class SyncArticleForLeaseChototController extends CrudController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\SyncArticleForLeaseModel");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/sync_chotot_article_for_lease');
        $this->crud->setEntityNameStrings('article', 'Lấy rao bán - cho thuê - chợ tốt');
        $this->crud->orderBy('date_sync', 'desc');
        $this->crud->enableBulkActions();
        $this->crud->addBulkDeleteButton();
        $this->crud->addFilter([ // daterange filter
            'type' => 'date_range',
            'name' => 'from_to',
            'label'=> 'Hiển thị theo thời gian'
        ],
            false,
            function($value) {
                $dates = json_decode(htmlspecialchars_decode($value, ENT_QUOTES));
                $this->crud->addClause('whereDate', 'created_at', '>=', $dates->from);
                $this->crud->addClause('whereDate', 'created_at', '<=', $dates->to);
            });
        $this->crud->addFilter([ // select2_multiple filter
            'name' => 'method_article',
            'type' => 'dropdown',
            'label'=> 'Phương thức',
            'placeholder' => 'Tìm Danh mục tin tức'
        ], [
            'Nhà đất cho thuê' => 'Nhà đất cho thuê',
            'Nhà đất bán' => 'Nhà đất bán'
        ], function ($values) {
            if (!empty($values)) {
                $this->crud->addClause('where', 'method_article', $values);
            }
        });
        $this->crud->addClause('where', 'build_from', 'chotot.com');
        $this->crud->addFilter([ // select2_multiple filter
            'name' => 'type_article',
            'type' => 'select2_multiple',
            'label'=> 'Danh mục',
            'placeholder' => 'Tìm Danh mục tin tức'
        ], function () {
            return TypeModel::orderBy('name')->where('id', '<', 20)->pluck('name', 'name')->toArray();
        }, function ($values) {
            $values = json_decode(htmlspecialchars_decode($values, ENT_QUOTES));
            if (!empty($values)) {
                $this->crud->addClause('whereIn', 'type_article', $values);
            }
        });

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
//        $this->crud->addColumn([
//                                'name' => 'created_at',
//                                'label' => 'Date',
//                                'type' => 'date',
//        ]);

        $Agent = new Agent();
        if($Agent->isMobile()) {


            $this->crud->addColumn([
                'name' => 'aprroval',
                'label' => 'XD',
                'type' => 'check',
            ]);
            $this->crud->addColumn([
                'name' => 'date_sync',
                'label' => 'Ngày tạo',
                'type' => 'date',
                'format' => 'd/m/Y',
            ]);
            $this->crud->addColumn([
                'name' => 'type_article',
                'label' => 'Thể loại',
            ]);

            $this->crud->addColumn([
                'name'  => 'id',
                'label' => 'ID',
                'type' => 'closure',
                'function' => function($entry) {
                    return '<a href="/quan-ly-tin/dang-tin-ban-cho-thue/'.$entry->id.'" target="_blank">'.$entry->id.'</a>';
                },
            ]);

            $this->crud->addColumn([
                'name' => 'title',
                'label' => 'Tiêu đề',
            ]);
            $this->crud->addColumn([
                'name' => 'build_from',
                'label' => 'Lấy từ',
            ]);
        } else {
            $this->crud->addColumn([
                'name'  => 'id',
                'label' => 'ID',
                'type' => 'closure',
                'function' => function($entry) {
                    return '<a href="/quan-ly-tin/dang-tin-ban-cho-thue/'.$entry->id.'" target="_blank">'.$entry->id.'</a>';
                },
            ]);
            $this->crud->addColumn([
                'name' => 'date_sync',
                'label' => 'Ngày tạo',
                'type' => 'date',
                'format' => 'd/m/Y',
            ]);

            $this->crud->addColumn([
                'name' => 'title',
                'label' => 'Tiêu đề',
            ]);
            $this->crud->addColumn([
                'name' => 'aprroval',
                'label' => 'Xét duyệt',
                'type' => 'check',
            ]);
            $this->crud->addColumn([
                'name' => 'type_article',
                'label' => 'Thể loại',
            ]);
        }
        $this->crud->addColumn([
            'name' => 'build_from',
            'label' => 'Lấy từ',
        ]);
        $this->crud->addColumn([
            'name' => 'views',
            'label' => 'Lượt xem',
            'type' => 'number',
        ]);
        $this->crud->addColumn([
            'name' => 'address',
            'label' => 'Địa chỉ',
        ]);
        $this->crud->addColumn([
            'name' => 'contact_name',
            'label' => 'Liên lạc',
        ]);
        $this->crud->addColumn([
            'name' => 'project',
            'label' => 'Dự án'
        ]);

        $this->crud->addColumn([
            'name' => 'contact_address',
            'label' => 'Địa chỉ liên lạc'
        ]);

        $this->crud->addColumn([
            'name' => 'contact_phone',
            'label' => 'Sđt liên lạc'
        ]);

        $this->crud->addColumn([
            'name' => 'contact_email',
            'label' => 'Email liên lạc'
        ]);

        $this->crud->addColumn([
            'name' => 'area',
            'label' => 'Diện tích'
        ]);

        $this->crud->addColumn([
            'name' => 'price_real',
            'label' => 'Giá',
            'type' => 'number'
        ]);
        $this->crud->addColumn([
            'name' => 'point',
            'label' => 'Điểm',
            'type' => 'number'
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Tình trạng',
        ]);





        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
            'name' => 'title',
            'label' => 'Tiêu đề',
            'type' => 'text',
            'placeholder' => 'Nhập tiêu đề tin tức',
        ]);
        $this->crud->addField([
            'name' => 'content_article',
            'label' => 'Thông tin mô tả',
            'type' => 'textarea',
            'rows' => '15',
        ]);
        $this->crud->addField([    // CHECKBOX
            'name' => 'aprroval',
            'label' => 'Tình trạng',
            'type' => 'checkbox',
        ]);

        $this->crud->enableAjaxTable();
        $this->crud->setListView('crud::list_sync_chotot_article_for_lease');
        $this->crud->setEditView('crud::edit_sync_chotot_for_lease_article');
    }

    public function store(StoreRequest $request)
    {
        $this->crud->hasAccessOrFail('create');

        // fallback to global request instance
        if (is_null($request)) {
            $request = \Request::instance();
        }

        // replace empty values with NULL, so that it will work with MySQL strict mode on
        foreach ($request->input() as $key => $value) {
            if (empty($value) && $value !== '0') {
                $request->request->set($key, null);
            }
        }

        // insert item in the db
        $item = $this->crud->create($request->except(['save_action', '_token', '_method', 'current_tab']));
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();
        Artisan::call('schedule:run');
        return $this->performSaveAction($item->getKey());
    }

    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        Artisan::call('schedule:run');
        $id = $this->crud->getCurrentEntryId() ?? $id;
        return $this->crud->delete($id);
    }

    public function update(UpdateRequest $request)
    {
        $this->crud->hasAccessOrFail('update');

        // fallback to global request instance
        if (is_null($request)) {
            $request = \Request::instance();
        }

        // replace empty values with NULL, so that it will work with MySQL strict mode on
        foreach ($request->input() as $key => $value) {
            if (empty($value) && $value !== '0') {
                $request->request->set($key, null);
            }
        }

        // update the row in the db
        $item = $this->crud->update($request->get($this->crud->model->getKeyName()),
            $request->except('save_action', '_token', '_method', 'current_tab'));
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();
        Artisan::call('schedule:run');
        return $this->performSaveAction($item->getKey());
    }
    public function approvalSyncArticle(Request $request, $id) {
        $article = SyncArticleForLeaseModel::find($id);
        $article->content_article = nl2br($article->content_article);
        $result = ArticleForLeaseModel::create($article->toArray());
        if($article->gallery_image) {
            $imgs = json_decode($article->gallery_image);
            $gallery_image = [];
            foreach ($imgs as $item) {
                $fileName = $result->id.'-'.$item;
                Storage::disk('public')->move(Helpers::file_path($article->id, SOURCE_DATA_SYNC_ARTICLE_LEASE, true).$item, Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).$fileName);
                Storage::disk('public')->move(Helpers::file_path($article->id, SOURCE_DATA_SYNC_ARTICLE_LEASE, true).THUMBNAIL_PATH.$item, Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).THUMBNAIL_PATH.$fileName);
                $gallery_image[] = $fileName;
            }
            $result->gallery_image = json_encode($gallery_image);
            $result->save();
        }
        $article->delete();
        \Alert::success('Duyệt tin thành công')->flash();
        return \Redirect::to($this->crud->route);
    }
    public function getSyncArticle() {
        return view('vendor.backpack.article.sync_article_for_lease_chotot');
    }
    public function storeSyncArticle(Request $request) {
        $url = '';
        $dataNews = [];
        $this->getArticleChotot($request->method_article, $request->str_html);
        \Alert::success('Đã lấy tin tức mới thành công')->flash();
        return \Redirect::to($this->crud->route);
    }
    function getArticleChotot($method, $strHtml) {
        preg_match_all('@<h3 class="ctAdListingTitle(.*?)">(.*?)</h3>@si', $strHtml, $data_title);
        preg_match_all('@<a rel="nofollow" class="ctAdListingItem" action="push" href="(.*?)">@si', $strHtml, $data_url);
        preg_match_all('@<h3 class="_3ygwQow5YdDcI2nenz6_nu(.*?)">(.*?)</h3>@si', $strHtml, $data_title2);
        preg_match_all('@<a class="_3JMKvS6hucA6KaM9tX3Qb1" href="(.*?)">@si',$strHtml, $data_url2);
        $data_url = array_merge($data_url[1], $data_url2[1]);
        $data_title = array_merge($data_title[2], $data_title2[2]);
        foreach ($data_title as $key => $item) {
            if(!SyncArticleForLeaseModel::where('title', $item)->first() && !SyncArticleForLeaseModel::where('title', $item)->first()) {
                $url = 'https://nha.chotot.com' . $data_url[$key];
                if(strpos($data_url[$key],"#") !== false) {
                    $url = 'https://nha.chotot.com' . substr($data_url[$key],0, strpos($data_url[$key],"#"));
                }
                $fileContent = $this->get_fcontent($url);
                preg_match_all('@"price":(.*?),@si', $fileContent[0], $price);
                preg_match_all('@adParams(.*?)"size","value":"(.*?) m²","label":"Diện tích@si', $fileContent[0], $area);
                preg_match_all('@"body":"(.*?)"@si', $fileContent[0], $body);
                preg_match_all('@"address","value":"(.*?)","label":"Địa chỉ"@si', $fileContent[0], $address);
                preg_match_all('@"account_name":"(.*?)"@si', $fileContent[0], $contact_name);
                preg_match_all('@"phone":"(.*?)"@si', $fileContent[0], $contact_phone);
//                preg_match_all('@reviewer_image":"(.*?)","reviewer_nickname":"(.*?)","images":\["(.*?)"]@si', $fileContent[0], $data_imgs_content);
//                $data_imgs_content = $data_imgs_content[3][0] ? explode('","', $data_imgs_content[3][0]) : null;
                if(isset($address[1][0])) {
                    $address[1][0] = str_replace('\u002F', '\\', $address[1][0]);
                    $addressExp = explode(', ', $address[1][0]);
                    $province_id = null;
                    $district_id = null;
                    $ward_id = null;
                    $street_id = null;
                    $province = str_replace('Tp ', '', array_pop($addressExp));
                    $district = array_pop($addressExp);
                    $ward = array_pop($addressExp);
                    $street = array_pop($addressExp);
                    $ward = explode(' ', $ward);
                    if($ward[0] == 'Phường' || $ward[0] == 'Xã'){
                        $ward_ = $ward[0];
                        unset($ward[0]);
                    }else{
                        $ward_ = '';
                    }
                    $ward = implode(' ', $ward);
                    $street_pos = strpos($street , 'Đường');
                    if($street_pos == false)
                        $street_pos = strpos($street, 'Phố');
                    if($street_pos) {
                        $street = substr($street, $street_pos);
                    }
                    $street = explode(' ', $street);
                    $street_ = $street[0];
                    unset($street[0]);
                    $street = implode(' ', $street);
                    $provinceData = ProvinceModel::where('_name', $province)->first();
                    if($provinceData) {
                        $districtData = DistrictModel::where('_name', $district)->where('_province_id', $provinceData->id)->first();
                        $province_id = $provinceData->id;
                        $district_id = $districtData->id ?? null;
                    }
                    if($province_id && $district_id) {
                        $wardData = WardModel::where([['_name', $ward], ['_prefix', $ward_]])->where([['_province_id', $province_id], ['_district_id', $district_id]])->first();
                        $ward_id = $wardData->id ?? null;
                    }
                    if($street && $province_id && $district_id) {
                        $streetData = StreetModel::where([['_name', $street], ['_prefix', $street_]])->where([['_province_id', $province_id], ['_district_id', $district_id]])->first();
                        $street_id = $streetData->id ?? null;
                    }
                    $price_ = 0;
                    $ddlPriceType = 'Thỏa Thuận';
                    if(isset($price[1][0])) {
                        $price_= $price[1][0] / 1000000;
                        $ddlPriceType = 'Triệu';
                        if(strlen($price[1][0]) > 9) {
                            $price_ = $price[1][0] / 1000000000;
                            $ddlPriceType = 'Tỷ';
                        }
                    }
                    $type = $this->get_Type_Article($method, explode('/', $data_url[$key])[2]);
                    $article = [
                        'title' => $item,
                        'method_article' => $method,
                        'type_article' => $type,
                        'province_id' => $province_id,
                        'province' => $province,
                        'district_id' => $district_id,
                        'district' => $district,
                        'ward_id' => $ward_id,
                        'ward' => $ward,
                        'street_id' => $street_id,
                        'street' => $street,
                        'address' => $address[1][0],
                        'project' => '',
                        'area' => $area[2][0] ?? null,
                        'price' => $price_,
                        'ddlPriceType' => $ddlPriceType,
                        'price_real' => $price[1][0] ?? 0,
                        'content_article' => str_replace('\u002F', '/', str_replace('\n', '<br />', $body[1][0])),
                        'facade' => null,
                        'land_width' => null,
                        'ddlHomeDirection' => null,
                        'ddlBaconDirection' => null,
                        'floor' => null,
                        'bed_room' => null,
                        'toilet' => $toilet[1][0] ?? null,
                        'gallery_image' => null,
                        'furniture' => null,
                        'contact_name' => $contact_name[1][0] ?? null,
                        'contact_address' => null,
                        'contact_phone' => $contact_phone[1][0] ?? null,
                        'contact_email' => null,
                        'status' => PUBLISHED_ARTICLE,
                        'prefix_url' =>  strtolower(Helpers::rawTiengVietUrl($type .'-'.($street ? $street : ($ward ? $ward : $district))).'/'.Helpers::rawTiengVietUrl($item)),
                        'user_id' => Auth::user()->id,
                        'aprroval' => APPROVAL_ARTICLE_PUBLIC,
                        'start_news' => time(),
                        'method_article_url' => Helpers::rawTiengVietUrl($method),
                        'type_article_url' => Helpers::rawTiengVietUrl($type),
                        'province_url' => Helpers::rawTiengVietUrl($province),
                        'district_url' => Helpers::rawTiengVietUrl($district),
                        'ward_url' => Helpers::rawTiengVietUrl($ward),
                        'street_url' => Helpers::rawTiengVietUrl($street),
                        'point' => -1,
                        'date_sync' => null,
                        'build_from' => 'chotot.com',
                        'url_from' => $url,
                    ];
                    $result = SyncArticleForLeaseModel::create($article);
//                $gallery_image = [];
//                if($data_imgs_content) {
//                    foreach ($data_imgs_content as $itemImgs) {
//                        $itemImgs = str_replace('\u002F', '\\', $itemImgs);
//                        $nameImg = $result->id . '-' . time() . '.png';
//                        $gallery_image[] = $nameImg;
//                        // thumnail
//                        $contentImg = file_get_contents($itemImgs);
//                        Storage::disk('public')->put(Helpers::file_path($result->id, SOURCE_DATA_SYNC_ARTICLE_LEASE, true) . THUMBNAIL_PATH . $nameImg, $contentImg);
//                        // fullsize
//                        Storage::disk('public')->put(Helpers::file_path($result->id, SOURCE_DATA_SYNC_ARTICLE_LEASE, true) . $nameImg, $contentImg);
//                    }
//                    $result->gallery_image = $gallery_image ? json_encode($gallery_image) : null;
//                }
//                    $result->save();
                }
            }
        }
    }
    function get_fcontent( $url,  $javascript_loop = 0, $timeout = 5 ) {
        $url = str_replace( "&amp;", "&", urldecode(trim($url)) );

//        $cookie = tempnam("/tmp", "CURLCOOKIE");
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
        curl_setopt( $ch, CURLOPT_URL, $url );
//        curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_ENCODING, "" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
        curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
        $content = curl_exec( $ch );
        $response = curl_getinfo( $ch );
        curl_close ( $ch );

        if ($response['http_code'] == 301 || $response['http_code'] == 302) {
            ini_set("user_agent", "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");

            if ( $headers = get_headers($response['url']) ) {
                foreach( $headers as $value ) {
                    if ( substr( strtolower($value), 0, 9 ) == "location:" )
                        return get_url( trim( substr( $value, 9, strlen($value) ) ) );
                }
            }
        }
        if (    ( preg_match("/>[[:space:]]+window\.location\.replace\('(.*)'\)/i", $content, $value) || preg_match("/>[[:space:]]+window\.location\=\"(.*)\"/i", $content, $value) ) && $javascript_loop < 5) {
            return get_url( $value[1], $javascript_loop+1 );
        } else {
            return array( $content, $response );
        }
    }
    function get_Type_Article($method, $urlPath) {
        if($method == 'Nhà đất bán') {
            if($urlPath == 'mua-ban-can-ho-chung-cu') {
                $result = 'Bán căn hộ chung cư';
            }elseif($urlPath == 'mua-ban-nha-dat') {
                $result = 'Bán nhà riêng';
            }elseif($urlPath == 'mua-ban-dat') {
                $result = 'Bán đất';
            }else {
                $result = 'Bán loại bất động sản khác';
            }
        }else{
            if($urlPath == 'thue-ban-can-ho-chung-cu') {
                $result = 'Cho Thuê căn hộ chung cư';
            }elseif($urlPath == 'thue-ban-nha-dat') {
                $result = 'Cho Thuê nhà riêng';
            }elseif($urlPath == 'thue-ban-dat') {
                $result = 'Cho Thuê đất';
            }else {
                $result = 'Cho Thuê loại bất động sản khác';
            }
        }
        return $result;
    }
}
