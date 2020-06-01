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

class ContactController extends CrudController
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
        $this->crud->setModel("App\Models\ContactModel");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/contact');
        $this->crud->setEntityNameStrings('contact', 'Danh sách liên lạc');
        $this->crud->orderBy('created_at', 'desc');
        $this->crud->denyAccess(['create']);

        $this->crud->enableBulkActions();
        $this->crud->addBulkDeleteButton();

        $this->crud->addFilter([ // daterange filter
            'type' => 'date_range',
            'name' => 'from_to',
            'label'=> 'Hiển thị theo thời gian cập nhật'
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
            'label'=> 'Tình trạng'
        ], [
            0 => 'Chưa xem',
            1 => 'Chưa phù hợp',
            2 => 'Đã xác nhận',
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
            'name'  => 'title',
            'label' => 'tiêu đề',
        ]);
        $this->crud->addColumn([
            'name'  => 'status',
            'label' => 'Tình Trạng',
            'type' => 'closure',
            'function' => function($entry) {
                if($entry->status == 0) {
                    return '<span class="label label-warning">Chưa xem</span>';
                }elseif($entry->status == 1) {
                    return '<span class="label label-default">Chưa phù hợp</span>';
                }elseif($entry->status == 2){
                    return '<span class="label label-default">Đã xác nhận</span>';
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

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Tên người gửi',
        ]);

        $this->crud->addField([
            'name' => 'title',
            'label' => 'Tiêu đề',
        ]);

        $this->crud->addField([
            'name' => 'phone',
            'label' => 'Số diện thoại',
        ]);

        $this->crud->addField([
            'name' => 'address',
            'label' => 'Địa chi',
        ]);

        $this->crud->addField([
            'name' => 'message',
            'label' => 'Nội dung gửi',
            'type' => 'textarea',
        ]);
        $this->crud->addField([
            'label' => 'Tình trạng',
            'type' => 'select_from_array',
            'name' => 'status',
            'options' => [0 => 'Chưa xem', 1 => 'Chưa phù hợp', 2 => 'Đã xác nhận'],
            'allows_null' => false,
            'default' => 0,
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
