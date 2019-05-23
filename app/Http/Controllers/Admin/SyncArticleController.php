<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\NewsCRUD\app\Http\Requests\ArticleRequest as StoreRequest;
use Backpack\NewsCRUD\app\Http\Requests\ArticleRequest as UpdateRequest;
use Artisan;
use App\Models\CategoryModel;

class SyncArticleController extends CrudController
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
        $this->crud->setModel("App\Models\SyncArticleModel");
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
        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => 'Tags',
            'type' => 'select2_multiple',
            'name' => 'tags', // the method that defines the relationship in your Model
            'entity' => 'tags', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "Backpack\NewsCRUD\app\Models\Tag", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);
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
    public function getSyncArticle() {
        return view('vendor.backpack.article.sync_article');
    }
    public function storeSyncArticle(Request $request) {
        $url = '';
        if($request->type == 'bds.com.vn') {
            $url = 'https://batdongsan.com.vn/tin-thi-truong';
        }
        $file = $this->get_fcontent($url);
        preg_match_all('@<a class="link_blue" href=\'(.*?)\'@si', $file[0], $data_url);
        preg_match_all('@<div class="datetime">\r\n(.*?)\r\n</div>@si', $file[0], $data_url_date);

        dd($request->start_date);

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
