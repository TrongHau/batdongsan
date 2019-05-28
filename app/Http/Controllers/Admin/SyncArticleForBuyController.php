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
use App\Models\SyncArticleModel;
use App\Models\ArticleModel;

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
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/sync_article');
        $this->crud->setEntityNameStrings('article', 'Lấy Tin Tức');
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
        $this->crud->setListView('crud::list_sync_article');
        $this->crud->setEditView('crud::edit_sync_article');
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
        return view('vendor.backpack.article.sync_article');
    }
    public function storeSyncArticle(Request $request) {
        $url = '';
        $dataNews = [];
        $dateStart = strtotime(str_replace('T', ' ', $request->start_date));
        $dateEnd = strtotime(str_replace('T', ' ', $request->end_date));

        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(5, 'tin-thi-truong', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(6, 'phan-tich-nhan-dinh', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(1, 'chinh-sach-quan-ly', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(7, 'bat-dong-san-the-gioi', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(8, 'tai-chinh-chung-khoan-bat-dong-san', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(2, 'thong-tin-quy-hoach', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(10, 'trinh-tu-thu-tuc', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(11, 'quyen-so-huu', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(12, 'tranh-chap', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(13, 'xay-dung-hoan-cong', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(14, 'nghia-vu-tai-chinh', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(15, 'cac-van-de-co-yeu-to-nuoc-ngoai', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(17, 'loi-khuyen-cho-nguoi-mua', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(18, 'loi-khuyen-cho-nguoi-ban', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(19, 'loi-khuyen-cho-nha-dau-tu', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(20, 'loi-khuyen-cho-nguoi-thue', $dateStart, $dateEnd);
        }
        if($request->type == 'bds.com.vn') {
            $this->getArticleBDS(21, 'loi-khuyen-cho-nguoi-cho-thue', $dateStart, $dateEnd);
        }
        \Alert::success('Đã lấy tin tức mới thành công')->flash();
        return \Redirect::to($this->crud->route);
    }
    function getArticleBDS($cat_id, $refixNews, $dateStart, $dateEnd) {
        $refixUrl = 'https://batdongsan.com.vn';
        for($i = 1; $i <= ($request->page ?? 1); $i++) {
            $file = $this->get_fcontent($refixUrl . '/' . $refixNews . '/p' . $i);
            preg_match_all('@id="ctl23_BodyContainer"(.*?)id="RightMainContent"@si', $file[0], $content);
            preg_match_all('@<a class="link_blue" href=\'(.*?)\' title=\'(.*?)\'>\r\n(.*?)</a>@si', $content[0][0], $data_url);
            preg_match_all('@<div class="datetime">\r\n(.*?)\r\n</div>@si', $content[0][0], $data_url_date);
            preg_match_all('@src=\'(.*?)\'@si', $content[0][0], $data_img);
            foreach ($data_url_date[1] as $key => $item) {
                $dateArticle = strtotime(str_replace('/', '-', substr($item, 6). ' '. substr($item, 0, 5)));
                if($dateArticle >= $dateStart && $dateArticle <= $dateEnd) {
                    $title = str_replace('\r\n', '', strip_tags($data_url[3][$key]));
                    if(!SyncArticleModel::where('title', $title)->first() && !ArticleModel::where('title', $title)->first()) {
                        $fileContent = $this->get_fcontent($refixUrl . $data_url[1][$key]);
                        preg_match_all('@<h2 id="ctl23_ctl00_divSummary" class="summary">(.*?)</h2>@si', $fileContent[0], $data_short_content);
                        preg_match_all('@<div id="divContents" class="detailsView-contents-style detail-article-content">(.*?)</div>\r\n<div id="ctl23_ctl00_divSourceNews"@si', $fileContent[0], $data_content);
                        $urlImage = $data_img[1][$key];
                        $contents = file_get_contents($urlImage);
                        $name = substr($urlImage, strrpos($urlImage, '/') + 1);
                        Storage::disk('public_uploads')->put('sync/cover/'.$refixNews.'/' . $name, $contents);
                        $contentData = $data_content[1][0] ?? '';
                        preg_match_all('@<img(.*?)>@si', $contentData, $data_imgs_content);
                        if(isset($data_imgs_content[0][0])) {
                            preg_match_all('@src="(.*?)"@si', $data_imgs_content[0][0], $data_imgs_content);
                            foreach ($data_imgs_content[1] as $itemImgs) {
                                $contentImg = file_get_contents($itemImgs);
                                $nameImg = substr($itemImgs, strrpos($itemImgs, '/') + 1);
                                Storage::disk('public_uploads')->put('sync/content/'.$refixNews.'/' . $nameImg, $contentImg);
                                $contentData = str_replace($contentData, $itemImgs, $nameImg);
                            }
                        }
                        SyncArticleModel::create([
                            'category_id' => $cat_id,
                            'title' => $title,
                            'short_content' => $data_short_content[1][0] ?? '',
                            'content' => $data_content[1][0] ?? '',
                            'image' => 'uploads/sync/cover/' . $refixNews . '/' . $name,
                        ]);
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
