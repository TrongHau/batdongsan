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
use App\Models\SyncArticleForBuyModel;
use App\Models\ArticleForBuyModel;
use App\Models\ArticleModel;
use App\Models\DistrictModel;
use App\Models\ProvinceModel;
use App\Models\WardModel;
use App\Models\StreetModel;

class SyncArticleForBuyController extends CrudController
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
        $this->crud->setModel("App\Models\SyncArticleForBuyModel");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/sync_article_for_buy');
        $this->crud->setEntityNameStrings('article', 'Lấy rao mua - cần thuê');
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
        $this->crud->setListView('crud::list_sync_article_for_buy');
        $this->crud->setEditView('crud::edit_sync_for_buy_article');
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
        $article = SyncArticleForBuyModel::where('id', $id)->first();
        if($article->gallery_image) {
            foreach (json_decode($article->gallery_image) as $item) {
                Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_BUY, true) . $item);
                Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_BUY, true) . THUMBNAIL_PATH . $item);
            }
        }
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
        $article = SyncArticleForBuyModel::find($id);
        $result = ArticleForBuyModel::create($article->toArray());
        if($article->gallery_image) {
            $imgs = json_decode($article->gallery_image);
            $gallery_image = [];
            foreach ($imgs as $item) {
                $fileName = $result->id.'-'.$item;
                Storage::disk('public')->move(Helpers::file_path($article->id, SOURCE_DATA_SYNC_ARTICLE_BUY, true).$item, Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).$fileName);
                Storage::disk('public')->move(Helpers::file_path($article->id, SOURCE_DATA_SYNC_ARTICLE_BUY, true).THUMBNAIL_PATH.$item, Helpers::file_path($result->id, SOURCE_DATA_ARTICLE_LEASE, true).THUMBNAIL_PATH.$fileName);
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
        return view('vendor.backpack.article.sync_article_for_buy');
    }
    public function storeSyncArticle(Request $request) {
        $url = '';
        $dataNews = [];
        $dateStart = strtotime($request->start_date . ' 00:00');
        $dateEnd = strtotime($request->end_date . ' 23:59');

        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS($request->type, 'nha-dat-can-mua', 'Nhà đất cần mua', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS($request->type, 'nha-dat-can-thue', 'Nhà đất cần thuê', $dateStart, $dateEnd);
        }
        \Alert::success('Đã lấy tin tức mới thành công')->flash();
        return \Redirect::to($this->crud->route);
    }
    function getArticleBDS($typeReq, $refixNews, $nameRefixNews, $dateStart, $dateEnd) {
        $refixUrl = 'https://batdongsan.com.vn';
        for($i = 1; $i <= ($request->page ?? 1); $i++) {
            $file = $this->get_fcontent($refixUrl . '/' . $refixNews . '/p' . $i);
            preg_match_all('@<div class="Main">(.*?)<div class="separable">@si', $file[0], $content);
            preg_match_all('@<div class=\'p-title\'>\r\n<a href=\'(.*?)\' title=\'(.*?)\'>@si', $content[0][0], $data_url);
            preg_match_all('@<div class=\'floatright mar-right-10 bot-right-abs\'>\r\n(.*?)</div>@si', $content[0][0], $data_url_date);
            foreach ($data_url_date[1] as $key => $item) {
                $dateArticle = strtotime(str_replace('/', '-', substr($item, -10)));
                if($dateArticle >= $dateStart && $dateArticle <= $dateEnd) {
                    $title = html_entity_decode(str_replace('\n', ' ', strip_tags($data_url[2][$key])));
                    if(!SyncArticleForBuyModel::where('title', $title)->first() && !ArticleForBuyModel::where('title', $title)->first()) {
                        $fileContent = $this->get_fcontent($refixUrl . $data_url[1][$key]);
                        preg_match_all('@<div class="pm-desc">\r\n(.*?)\r\n</div>@si', $fileContent[0], $data_content);
                        preg_match_all('@<img onmouseover="this.style.cursor=\'pointer\'" alt="(.*?)" title=\'(.*?)\' src=\'(.*?)\' />@si', $fileContent[0], $data_imgs_content);
                        preg_match_all('@Giá:</b>\r\n<strong>\r\n(.*?) (.*?) - (.*?) (.*?)&nbsp;@si', $fileContent[0], $price);
                        preg_match_all('@Diện tích:</b>\r\n<strong>\r\n(.*?)</strong>@si', $fileContent[0], $area);
                        preg_match_all('@Loại tin rao\r\n</div>\r\n<div class="right">\r\n(.*?)\r\n</div>@si', $fileContent[0], $type);
                        preg_match_all('@Thuộc dự án\r\n</div>\r\n<div class="right">\r\n<a href=\'(.*?)\'>(.*?)</a>\r\n@si', $fileContent[0], $project);
                        preg_match_all('@Địa chỉ\r\n</div>\r\n<div class="right">\r\n(.*?)\r\n</div>@si', $fileContent[0], $province);
                        preg_match_all('@Tên liên lạc\r\n</div>\r\n<div class="right">\r\n(.*?)\r\n</div>@si', $fileContent[0], $contact_name);
                        preg_match_all('@Mobile\r\n</div>\r\n<div class="right">\r\n(.*?)\r\n</div>@si', $fileContent[0], $contact_phone);
                        preg_match_all('@Địa chỉ\r\n</div>\r\n<div class="right">\r\n(.*?)\r\n</div>@si', $fileContent[0], $contact_address);
                        $province_ = explode(',', $province[1][0]);
                        $address = $province[1][0];
                        $province__ = explode(' - ', last($province_));
                        $province = trim(last($province__));
                        array_pop($province__);
                        $district = trim(last($province__));
                        $district = explode(' ', $district);
                        if($district[0] == 'Quận' || $district[0] == 'Huyện'){
                            $district_ = $district[0];
                            unset($district[0]);
                        }else{
                            $district_ = '';
                        }
                        $district = implode(' ', $district);
                        $province_id = null;
                        $district_id = null;
                        $ward_id = null;
                        $street_id = null;
                        $ward = null;
                        $street = null;
                        $provinceData = ProvinceModel::where('_name', $province)->first();
                        if($provinceData) {
                            $districtData = DistrictModel::where(function($q) use ($district, $district_) {
                                $q->where('_name', $district);
                                if($district_)
                                    $q->orWhere('_name', $district_ . ' ' .$district);
                            })->where('_province_id', $provinceData->id)->first();
                            $province_id = $provinceData->id;
                            $district_id = $districtData->id ?? null;
                            $district = $districtData->_name ?? null;
                        }
                        $project = $project[2][0] ?? null;
                        if(!is_numeric($price[1][0])) {
                            $price_ = 0;
                            $ddlPriceType = 'Thỏa thuận';
                            $price[1][0] = null;
                            $price[3][0] = null;
                        }else{
                            $price_ = $price[1][0];
                            $ddlPriceType = str_replace('m²', 'm2', ucfirst($price[4][0] ?? null));
                            if(!$ddlPriceType) {
                                $ddlPriceType = str_replace('m²', 'm2', ucfirst($price[2][0] ?? null));
                            }
                        }
                        $type = $type[1][0] ?? null;
                        if(($strPostype = strpos($type, '(')) != false) {
                            $type = substr($type, 0, $strPostype - 1);
                        }
                        $area = isset($area[1][0]) ? str_replace('m²', '', $area[1][0]) : null;
                        $area = $area == 'Không xác định' ? null : $area;
                        $area_from = $area ? ((explode(' - ', $area)[0]) ?? null) : null;
                        $area_to = $area ? (explode(' - ', $area)[1] ?? null) : null;
                        $article = [
                            'title' => $title,
                            'method_article' => $nameRefixNews,
                            'type_article' => $type,
                            'province_id' => $province_id,
                            'province' => $province,
                            'district_id' => $district_id,
                            'district' => $district,
                            'ward_id' => $ward_id,
                            'ward' => $ward,
                            'street_id' => $street_id,
                            'street' => $street,
                            'address' => $address,
                            'project' => $project,
                            'area_from' => is_numeric($area_from) ? $area_from : null,
                            'area_to' => is_numeric($area_to) ? $area_to : null,
                            'price_from' => $price[1][0] ?? null,
                            'price_to' => $price[3][0] ?? null,
                            'unit' => '',
                            'ddlPriceType' => $ddlPriceType,
                            'price_real' => $price_ * Helpers::convertCurrency($price[2][0] ?? null),
                            'content_article' => $data_content[1][0] ?? null,
                            'gallery_image' => null,
                            'contact_name' => $contact_name[1][0] ?? null,
                            'contact_address' => $contact_address[1][0] ?? null,
                            'contact_phone' => $contact_phone[1][0] ?? null,
                            'contact_email' => null,
                            'status' => PUBLISHED_ARTICLE,
                            'prefix_url' =>  strtolower(Helpers::rawTiengVietUrl($type .'-'.explode(',', $address)[0]).'/'.Helpers::rawTiengVietUrl($title)),
                            'user_id' => Auth::user()->id,
                            'aprroval' => APPROVAL_ARTICLE_PUBLIC,
                            'start_news' => time(),
                            'method_article_url' => Helpers::rawTiengVietUrl($nameRefixNews),
                            'type_article_url' => Helpers::rawTiengVietUrl($type ?? null),
                            'province_url' => Helpers::rawTiengVietUrl($province),
                            'district_url' => Helpers::rawTiengVietUrl($district),
                            'ward_url' => Helpers::rawTiengVietUrl($ward),
                            'street_url' => Helpers::rawTiengVietUrl($street),
                            'point' => -1,
                            'date_sync' => $dateStart,
                            'build_from' => $typeReq,
                            'url_from' => $refixUrl . $data_url[1][$key]
                        ];

                        $result = SyncArticleForBuyModel::create($article);
                        $gallery_image = [];
                        if(isset($data_imgs_content[3])) {
                            foreach ($data_imgs_content[3] as $itemImgs) {
                                if($itemImgs) {
                                    $nameImg = $result->id . '-' . substr($itemImgs, strrpos($itemImgs, '/') + 1);
                                    $gallery_image[] = $nameImg;
                                    // thumnail
                                    $contentImg = file_get_contents($itemImgs);
                                    Storage::disk('public')->put(Helpers::file_path($result->id, SOURCE_DATA_SYNC_ARTICLE_BUY, true) . THUMBNAIL_PATH . $nameImg, $contentImg);
                                    $contentImg = file_get_contents(str_replace('200x200', '745x510', $itemImgs));
                                    // fullsize
                                    Storage::disk('public')->put(Helpers::file_path($result->id, SOURCE_DATA_SYNC_ARTICLE_BUY, true) . $nameImg, $contentImg);
                                }
                            }
                            $result->gallery_image = $gallery_image ? json_encode($gallery_image) : null;
                        }
                        $result->save();
                    }
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
}
