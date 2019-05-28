<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\NewsCRUD\app\Http\Requests\ArticleRequest as StoreRequest;
use Backpack\NewsCRUD\app\Http\Requests\ArticleRequest as UpdateRequest;
use Artisan;
use Storage;
use App\Models\CategoryModel;
use App\Models\SyncArticleForLeaseModel;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleModel;
use App\Models\DistrictModel;
use App\Models\ProvinceModel;
use App\Models\WardModel;
use App\Models\StreetModel;

class SyncArticleForLeaseController extends CrudController
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
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/sync_article_for_lease');
        $this->crud->setEntityNameStrings('article', 'Lấy Tin Rao Cho Thuê');
        $this->crud->orderBy('id', 'desc');

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
            'name' => 'roles',
//            'type' => 'dropdown',
            'type' => 'select2_multiple',
            'label'=> 'Danh mục',
            'placeholder' => 'Tìm Danh mục tin tức'
        ], function () {
            return CategoryModel::orderBy('name')->get()->pluck('name', 'id')->toArray();
        }, function ($values) {
            $values = json_decode(htmlspecialchars_decode($values, ENT_QUOTES));
            if (!empty($values)) {
                $this->crud->addClause('whereIn', 'category_id', $values);
            }
        });
        $this->crud->enableBulkActions();
        $this->crud->addBulkDeleteButton();
        $this->crud->addColumn([
            'name'  => 'id',
            'label' => 'ID',
            'type' => 'closure',
            'function' => function($entry) {
                return '<a href="/'.$entry->category->slug.'/'.$entry->slug.'" target="_blank">'.$entry->id.'</a>';
            },
        ]);
        $this->crud->addColumn([
            'name' => 'title',
            'label' => 'Tiêu đề',
        ]);
        $this->crud->addColumn([
            'name' => 'featured',
            'label' => 'Nỗi bật',
            'type' => 'check',
        ]);

        $this->crud->addColumn([
            'label' => 'Danh mục',
//                                'type' => 'closure',
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Backpack\NewsCRUD\app\Models\Category",
//                                'function' => function($entry) {
//                                    return $entry->category->name;
//                                }
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Tình trạng',
        ]);
        $this->crud->addColumn([
            'name' => 'views',
            'label' => 'Lượt xem',
            'type' => 'number',
        ]);
        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
            'name' => 'title',
            'label' => 'Tiêu đề',
            'type' => 'text',
            'placeholder' => 'Nhập tiêu đề tin tức',
        ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => 'Sẽ được tạo tự động từ tiêu đề của bạn, nếu để trống.',
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([
            'name' => 'short_content',
            'label' => 'Nội dung ngắn',
            'type' => 'textarea',
            'placeholder' => 'Nội dung ngắn thể hiện',
        ]);

        $this->crud->addField([    // WYSIWYG
            'name' => 'content',
            'label' => 'Nội dung',
            'type' => 'ckeditor',
            'placeholder' => 'Your textarea text here',
        ]);

        $this->crud->addField([    // Image
            'name' => 'image',
            'label' => 'Ảnh đại diện',
            'type' => 'browse',
        ]);
        $this->crud->addField([    // SELECT
            'label' => 'Danh mục',
            'type' => 'select2',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Backpack\NewsCRUD\app\Models\Category",
        ]);
//        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
//            'label' => 'Tags',
//            'type' => 'select2_multiple',
//            'name' => 'tags', // the method that defines the relationship in your Model
//            'entity' => 'tags', // the method that defines the relationship in your Model
//            'attribute' => 'name', // foreign key attribute that is shown to user
//            'model' => "Backpack\NewsCRUD\app\Models\Tag", // foreign key model
//            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
//        ]);
        $this->crud->addField([    // ENUM
            'name' => 'status',
            'label' => 'Tình trạng',
            'type' => 'enum',
        ]);
        $this->crud->addField([    // CHECKBOX
            'name' => 'featured',
            'label' => 'Nỗi bật',
            'type' => 'checkbox',
        ]);

        $this->crud->enableAjaxTable();
        $this->crud->setListView('crud::list_sync_article_for_lease');
        $this->crud->setEditView('crud::edit_sync_article_for_lease');
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
        $article = SyncArticleModel::find($id);
        ArticleModel::create($article->toArray());
        $article->delete();
        \Alert::success('Duyệt tin thành công')->flash();
        return \Redirect::to($this->crud->route);
    }
    public function getSyncArticle() {
        return view('vendor.backpack.article.sync_article_for_lease');
    }
    public function storeSyncArticle(Request $request) {
        $url = '';
        $dataNews = [];
        $dateStart = strtotime(str_replace('T', ' ', $request->start_date));
        $dateEnd = strtotime(str_replace('T', ' ', $request->end_date));

        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(21, 'nha-dat-ban', 'Nhà đất bán', $dateStart, $dateEnd);
        }
        \Alert::success('Đã lấy tin tức mới thành công')->flash();
        return \Redirect::to($this->crud->route);
    }
    function getArticleBDS($cat_id, $refixNews, $nameRefixNews, $dateStart, $dateEnd) {
        $refixUrl = 'https://batdongsan.com.vn';
        for($i = 1; $i <= ($request->page ?? 1); $i++) {
            $file = $this->get_fcontent($refixUrl . '/' . $refixNews . '/p' . $i);
            preg_match_all('@<div class="Main">(.*?)<div class="mt5">@si', $file[0], $content);
            preg_match_all('@<a href=\'(.*?)\' title=\'(.*?)\' style="text-rendering: optimizelegibility;">\r\n(.*?)\r\n</a>@si', $content[0][0], $data_url);
            preg_match_all('@<div class=\'floatright mar-right-10\'>\r\n(.*?)</span>\r\n</div>@si', $content[0][0], $data_url_date);
            foreach ($data_url_date[1] as $key => $item) {
                $dateArticle = strtotime(str_replace('/', '-', substr($item, -10)));
                if($dateArticle >= $dateStart && $dateArticle <= $dateEnd) {
                    $title = str_replace('\n', ' ', strip_tags($data_url[3][$key]));
                    if(!SyncArticleForLeaseModel::where('title', $title)->first() && !ArticleForLeaseModel::where('title', $title)->first()) {
                        $fileContent = $this->get_fcontent($refixUrl . $data_url[1][$key]);
                        preg_match_all('@<div class="pm-desc">\r\n(.*?)\r\n</div>@si', $fileContent[0], $data_content);
                        preg_match_all('@<img itemprop="image"(.*?)src=\'(.*?)\'@si', $fileContent[0], $data_imgs_content);
                        $contentData = $data_content[1][0] ?? '';
                        if(isset($data_imgs_content[2])) {
                            foreach ($data_imgs_content[2] as $itemImgs) {
                                $contentImg = file_get_contents(str_replace('200x200', '745x510', $itemImgs));
                                $nameImg = substr($itemImgs, strrpos($itemImgs, '/') + 1);
//                                Storage::disk('public_uploads')->put($result->id, SOURCE_DATA_ARTICLE_LEASE, true) . $nameImg, $contentImg);
                            }
                        }
                        preg_match_all('@Giá:</b>\r\n<strong>\r\n(.*?) (.*?)&nbsp;@si', $fileContent[0], $price);
                        preg_match_all('@Diện tích:</b>\r\n<strong>\r\n(.*?)</strong>@si', $fileContent[0], $are);
                        preg_match_all('@Loại tin rao\r\n</div>\r\n<div class="right">\r\n(.*?)\r\n</div>\r\n@si', $fileContent[0], $type);
                        preg_match_all('@Địa chỉ\r\n</div>\r\n<div class="right">\r\n(.*?)\r\n</div>\r\n@si', $fileContent[0], $province);
                        $province_ = explode(',', $province[1][0]);
                        if(count($province_) == 5) {
                            $project = trim($province_[0]);
                            $province = trim($province_[4]);
                            $district = trim($province_[3]);
                            $ward = trim($province_[2]);
                            $street= trim($province_[1]);
                        }elseif(count($province_) == 4) {
                            $project = '';
                            $province = trim($province_[3]);
                            $district = trim($province_[2]);
                            $ward = trim($province_[1]);
                            $street= trim($province_[0]);
                        }elseif(count($province_) == 3) {
                            $project = trim($province_[0]);
                            $province = trim($province_[2]);
                            $district = trim($province_[1]);
                            $ward = '';
                            $street= '';
                        }elseif(count($province_) == 2) {
                            $project = '';
                            $province = trim($province_[1]);
                            $district = trim($province_[0]);
                            $ward = '';
                            $street = '';
                        }
                        $province_id = '';
                        $district_id = '';
                        $ward_id = '';
                        $street_id = '';
                        $provinceData = ProvinceModel::whereRaw('LOWER(`_name`) LIKE ? ',[trim(strtolower($province))])->first();
                        if($provinceData) {
                            $districtData = DistrictModel::whereRaw('LOWER(`_name`) LIKE ? ',[trim(strtolower($district))])->where('_province_id', $provinceData->id)->first();
                            $province_id = $provinceData->id;
                            $district_id = $districtData->id ?? '';
                        }
                        if($ward && $province_id && $district_id) {
                            $wardData = WardModel::whereRaw('LOWER(`_name`) LIKE ? ',[trim(strtolower($ward))])->where([['_province_id', $province_id], ['_district_id', $district_id]])->first();
                            $ward_id = $wardData->id ?? '';
                        }
                        if($street && $province_id && $district_id) {
                            $streetData = WardModel::whereRaw('LOWER(`_name`) LIKE ? ',[trim(strtolower($street))])->where([['_province_id', $province_id], ['_district_id', $district_id]])->first();
                            $street_id = $streetData->id ?? '';
                        }
                        dd(1);
                        $article = [
                            'title' => $title,
                            'method_article' => $nameRefixNews,
                            'type_article' => $type[1][0] ?? '',
                            'province_id' => $province_id,
                            'province' => $province,
                            'district_id' => $district_id,
                            'district' => $district,
                            'ward_id' => $ward_id,
                            'ward' => $ward,
                            'street_id' => $street_id,
                            'street' => $street,
                            'address' => ($street ? $street. ', ' : '') . ($ward ? $ward. ', ' : '') . $district . ', ' . $province,
                            'project' => $project,
                            'area' => isset($are[1][0]) ? str_replace('m²', '', $are[1][0]) : '',
                            'price' => $price[1][0] ?? '',
                            'ddlPriceType' => $price[2][0] ?? '',
                            'price_real' => ($price[1][0] ?? 0) * Helpers::convertCurrency($price[2][0] ?? ''),
                            'content_article' => $data_content[1][0] ?? '',
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
                            'status' => $request->submit_type == 'draf' ? DRAFT_ARTICLE : PUBLISHED_ARTICLE,
                            'prefix_url' =>  strtolower(Helpers::rawTiengVietUrl($request->type_article.($request->project ? '-du-an-'.$request->project : '').'-'.explode(',', $request->address)[0]).'/'.Helpers::rawTiengVietUrl($request->title))
                        ];














                        SyncArticleForLeaseModel::create($article);
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
