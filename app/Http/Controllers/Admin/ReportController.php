<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;
use App\User;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleForBuyModel;
use Storage;
use App\Library\Helpers;

class ReportController extends CrudController
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
        $this->crud->setModel("App\Models\ReportModel");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/report');
        $this->crud->setEntityNameStrings('phone', 'Danh sách than phiền');
        $this->crud->orderBy('created_at', 'desc');
        $this->crud->denyAccess(['create']);

        $this->crud->enableBulkActions();
        $this->crud->addBulkDeleteButton();

        $this->crud->addFilter([ // daterange filter
            'type' => 'date_range',
            'name' => 'from_to',
            'label'=> 'Hiển thị theo thời gian cập nhật phone'
        ],
            false,
            function($value) {
                $dates = json_decode(htmlspecialchars_decode($value, ENT_QUOTES));
                $this->crud->addClause('whereDate', 'created_at', '>=', $dates->from);
                $this->crud->addClause('whereDate', 'created_at', '<=', $dates->to);
            });
        $this->crud->addFilter([ // dropdown filter
            'name' => 'status',
            'type' => 'dropdown',
            'label'=> 'Tình Trạng'
        ], [
            'Không có địa chỉ, số điện thoại người bán.' => 'Không có địa chỉ, số điện thoại người bán.',
            'Không có địa chỉ, số điện thoại người bán.' => 'Không có địa chỉ, số điện thoại người bán.',
            'Không có thông tin về sản phẩm.' => 'Không có thông tin về sản phẩm.',
            'Tiêu đề tin không dấu/có ký tự lạ.' => 'Tiêu đề tin không dấu/có ký tự lạ.',
            'Đăng tin sai quy định' => 'Đăng tin sai quy định',
            'Đăng tin khống.' => 'Đăng tin khống.',
        ], function($value) { // if the filter is active
            $this->crud->addClause('where', 'status', $value);
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
        $this->crud->addColumn([
            'name' => 'created_at',
            'label' => 'Ngày tạo',
            'type' => 'date',
            'format' => 'd/m/Y',
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Tên người gửi'
        ]);
        $this->crud->addColumn([
            'name'  => 'email',
            'label' => 'Email người gửi',
        ]);
        $this->crud->addColumn([
            'name'  => 'reason_report',
            'label' => 'Lý do gửi',
        ]);
        $this->crud->addColumn([
            'name'  => 'content',
            'label' => 'nội dung gửi',
        ]);
        $this->crud->addColumn([
            'name'  => 'method',
            'label' => 'Hình thức tin',
        ]);
        $this->crud->addColumn([
            'name'  => 'article_id',
            'label' => 'Id tin tức',
        ]);
        $this->crud->addColumn([
            'name' => 'article_id',
            'label' => 'Liên kết tin',
            'type' => 'closure',
            'function' => function($entry) {
                if($entry->method == 'Nhà đất cần mua' || $entry->method == 'Nhà đất cần thuê') {
                    if($entry->Buy)
                        return '<a href="/admin/article_for_buy/'.$entry->article_id.'/edit" target="_blank">'.$entry->article_id.'</a>';
                    return $entry->article_id;
                }else{
                    if($entry->Lease)
                        return '<a href="/admin/article_for_lease/'.$entry->article_id.'/edit" target="_blank">'.$entry->article_id.'</a>';
                    return $entry->article_id;
                }
            },
        ]);
        $this->crud->addColumn([
            'label' => 'User',
            'type' => 'select',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => "App\User",
        ]);
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}
