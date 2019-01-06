<?php

namespace Backpack\NewsCRUD\app\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\NewsCRUD\app\Http\Requests\ArticleRequest as StoreRequest;
use Backpack\NewsCRUD\app\Http\Requests\ArticleRequest as UpdateRequest;

class ArticleCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("Backpack\NewsCRUD\app\Models\Article");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/article');
        $this->crud->setEntityNameStrings('article', 'Tin Tức');
        $this->crud->orderBy('id', 'desc');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'created_at',
                                'label' => 'Date',
//                                'type' => 'date',
        ]);
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Tiêu đề',
                            ]);
        $this->crud->addColumn([
                                'name' => 'featured',
                                'label' => 'Featured',
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
        $this->crud->addField([    // ENUM
                                'name' => 'status',
                                'label' => 'Tình trạng',
                                'type' => 'enum',
                            ]);
        $this->crud->addField([    // CHECKBOX
                                'name' => 'featured',
                                'label' => 'Tin nỗi bật',
                                'type' => 'checkbox',
                            ]);

        $this->crud->enableAjaxTable();
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
