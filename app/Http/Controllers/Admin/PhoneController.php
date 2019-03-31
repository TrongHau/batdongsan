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

class PhoneController extends CrudController
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
        $this->crud->setModel("App\Models\PhoneModel");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/phone');
        $this->crud->setEntityNameStrings('phone', 'Danh sách số điện thoại');
        $this->crud->orderBy('updated_at', 'desc');

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
                $this->crud->addClause('whereDate', 'updated_at', '>=', $dates->from);
                $this->crud->addClause('whereDate', 'updated_at', '<=', $dates->to);
            });
        $this->crud->addFilter([ // dropdown filter
            'name' => 'status',
            'type' => 'dropdown',
            'label'=> 'Tình Trạng'
        ], [
            0 => 'V.hiệu hóa',
            1 => 'Hoạt động',
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
            'name' => 'phone',
            'label' => 'Số điện thoại'
        ]);
        $this->crud->addColumn([
            'name'  => 'status',
            'label' => 'Tình trạng',
            'type' => 'closure',
            'function' => function($entry) {
                return $entry->status == 0 ? '<span class="label label-default">V.hiệu hóa</span>' : '<span class="label label-success">Hoạt động</span>';
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

        $this->crud->addColumn([
            'name' => 'count_sms',
            'label' => 'gửi sms',
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'label' => 'Ngày tạo',
            'type' => 'date',
            'format' => 'd/m/Y',
        ]);
        $this->crud->addColumn([
            'name' => 'updated_at',
            'label' => 'Ngày cập nhật',
            'type' => 'date',
            'format' => 'd/m/Y',
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
            'name' => 'phone',
            'label' => 'Số điện thoại',
            'type' => 'text',
            'max' => 20,
            'placeholder' => 'Nhập số điện thoại',
        ]);

        $this->crud->addField([
            'label' => 'Tình trạng',
            'type' => 'select_from_array',
            'name' => 'status',
            'options' => [0 => 'V.hiệu hóa', 1 => 'Hoạt động'],
            'allows_null' => false,
            'default' => 1,
        ]);
        $this->crud->addField([
            'name' => 'note',
            'label' => 'Thông tin ghi chú',
            'type' => 'textarea',
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
