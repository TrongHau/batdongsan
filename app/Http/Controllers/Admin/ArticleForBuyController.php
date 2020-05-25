<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;
use App\User;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleForBuyModel;
use App\Models\TypeModel;
use Storage;
use App\Library\Helpers;
use Mail;
use Jenssegers\Agent\Agent;

class ArticleForBuyController extends CrudController
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
        $this->crud->setModel("App\Models\ArticleForBuyModel");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/article_for_buy');
        $this->crud->setEntityNameStrings('article_for_lease', 'Tin rao cần mua, cần cho thuê đất');
        $this->crud->orderBy('id', 'desc');

        $this->crud->denyAccess(['create']);
//        $this->crud->enableBulkActions();
//        $this->crud->addBulkDeleteButton();

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
            'Nhà đất cần mua' => 'Nhà đất cần mua',
            'Nhà đất cần thuê' => 'Nhà đất cần thuê'
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
            return TypeModel::orderBy('name')->where('id', '>=', 20)->pluck('name', 'name')->toArray();
        }, function ($values) {
            $values = json_decode(htmlspecialchars_decode($values, ENT_QUOTES));
            if (!empty($values)) {
                $this->crud->addClause('whereIn', 'type_article', $values);
            }
        });
        $this->crud->addFilter([ // select2_multiple filter
            'name' => 'type_vip',
            'type' => 'dropdown',
            'label'=> 'Loại tin Vip',
            'placeholder' => 'Tìm thể loại tin VIP'
        ], [
            0 => 'Tin thường',
            1 => 'Tin vip thường',
            2 => 'Tin vip bạc',
            3 => 'Tin vip vàng',
            4 => 'Tin vip kim cương',
            -1 => 'Tin vip bị dừng',
        ], function ($values) {
            if (!empty($values)) {
                $this->crud->addClause('where', 'type_vip', $values);
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
                'name' => 'created_at',
                'label' => 'Ngày tạo',
                'type' => 'closure',
                'function' => function($entry) {
                    return '<a href="/'.$entry->prefix_url.'-bds-'.$entry->id.'" target="_blank">'.date_format(date_create($entry->created_at),"d-m-Y").'</a>';
                },
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
                'name' => 'created_at',
                'label' => 'Ngày tạo',
                'type' => 'closure',
                'function' => function($entry) {
                    return '<a href="/'.$entry->prefix_url.'-bds-'.$entry->id.'" target="_blank">'.date_format(date_create($entry->created_at),"d-m-Y").'</a>';
                },
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
                'name' => 'featured',
                'label' => 'Nỗi bật',
                'type' => 'check',
            ]);
            $this->crud->addColumn([
                'name'  => 'expired_vip',
                'label' => 'Tình Trạng Vip',
                'type' => 'closure',
                'function' => function($entry) {
                    if($entry->expired_vip == null || $entry->expired_vip == 0) {
                        return '<span class="label label-default">Tin Thường</span>';
                    }else{
                        $timeHtml = '';
                        if($entry->expired_vip < time()) {
                            $timeHtml = '<span class="label label-warning">Hết hạn</span>';
                        }
                        if($entry->type_vip == 1) {
                            return '<span class="label label-primary">Vip thường</span>' . $timeHtml;
                        }elseif ($entry->type_vip == 2) {
                            return '<span class="label label-primary">Vip bạc</span>' . $timeHtml;
                        }elseif ($entry->type_vip == 3) {
                            return '<span class="label label-primary">Vip vàng</span>' . $timeHtml;
                        }elseif ($entry->type_vip == 4) {
                            return '<span class="label label-primary">Vip kim cương</span>' . $timeHtml;
                        }elseif ($entry->type_vip == -1) {
                            return '<span class="label label-default">Vip bị dừng</span>' . $timeHtml;
                        }
                    }
                },
            ]);
            $this->crud->addColumn([
                'name' => 'type_article',
                'label' => 'Thể loại',
            ]);
        }

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
            'label' => 'Tình Trạng',
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
        $this->crud->addField([    // CHECKBOX
            'name' => 'featured',
            'label' => 'Nỗi bật',
            'type' => 'checkbox',
        ]);
        $this->crud->addField([    // CHECKBOX
            'name' => 'expired_vip',
            'label' => 'Thời hạn tin VIP',
            'type' => "date_timespan",
            'default' => 'Chưa có VIP',
            'attributes' => ['disabled' => 'disabled'],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->addField([
            'label' => 'Gia Hạn VIP',
            'type' => 'select_from_array',
            'name' => 'expired_vip_input',
            'options' => [0 => 'Thêm Hạn Tin VIP', 1 => '1 Ngày', 3 => '3 Ngày', 7 => '7 Ngày', 14 => '14 Ngày', 30 => '30 Ngày'],
            'allows_null' => false,
            'default' => 0,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->addField([
            'label' => 'Loại vip đã mua',
            'type' => 'select_from_array',
            'name' => 'type_vip',
            'options' => [0 => 'Tin thường', 1 => 'Tin Vip thường', 2 => 'Tin Vip bạc', 3 => 'Tin Vip vàng', 4 => 'Tin Vip Kim Cương', -1 => 'Vip bị dừng'],
            'allows_null' => false,
            'default' => 0,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4',
            ],
        ]);
        $this->crud->enableAjaxTable();
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
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
        if($request->expired_vip_input > 0) {
            \Alert::error('Vui lòng chọn thể loại Vip tin tức')->flash();
            return \Redirect::to($this->crud->route);
        }

        // update the row in the db
        $dataArticle = ArticleForBuyModel::where('id', $request->id)->first();

        if($dataArticle->aprroval == 0 && $request->aprroval && $dataArticle->contact_email) {
            $data = [
                'article' => $dataArticle,
                'prefix_admin_edit' => 'article_for_lease',
            ];
            Mail::send('emails.approval_article_lease_buy', $data, function($message) use ($dataArticle)
            {
                $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                //env('MAIL_USERNAME_NEW_ARTICLE')
                $message->to($dataArticle->contact_email, $dataArticle->contact_email)->subject('Tin rao đã được kiểm duyệt');
            });

        }
        $item = $this->crud->update($request->get($this->crud->model->getKeyName()),
            $request->except('save_action', '_token', '_method', 'current_tab'));
        $this->data['entry'] = $this->crud->entry = $item;

        if($request->expired_vip_input == -1) {
            $item->type_vip = -1;
            $item->save();
        }else{
            if($request->expired_vip_input > 0) {
                $item->created_time_vip = time();
                $item->expired_vip = strtotime("+" . $request->expired_vip_input . " day");
                $item->save();
            }
        }

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($item->getKey());
    }
    public function edit($id, $template = false)
    {
        $this->crud->hasAccessOrFail('update');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;
        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;
        $this->data['id'] = $id;

        return view('vendor.backpack.article.edit_for_buy', $this->data);
    }
    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;
        $article = $this->crud->getModel()::where('id', $id)->first();
        if($article->gallery_image) {
            foreach (json_decode($article->gallery_image) as $item) {
                Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_BUY, true) . $item);
                Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_BUY, true) . THUMBNAIL_PATH . $item);
            }
        }
        return $this->crud->delete($id);
    }
    public function upArticle($id) {
        $article = \App\Models\ArticleForBuyModel::find($id);
        $article->created_at = date("Y-m-d H:i:s");
        $article->save();
        \Alert::success(trans('backpack::crud.update_success'))->flash();
        $this->setSaveAction();
        return $this->performSaveAction($id);
    }
}
