@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            <span class="text-capitalize">{{ $crud->entity_name_plural }}</span>
            <small>{{ trans('backpack::crud.edit').' '.$crud->entity_name }}.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix'),'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
            <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
            <li class="active">{{ trans('backpack::crud.edit') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Default box -->
            @if ($crud->hasAccess('list'))
                <a href="{{ url($crud->route) }}" class="hidden-print"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a><br><br>
            @endif

            @include('crud::inc.grouped_errors')

            <form method="post"
                  action="{{ url($crud->route.'/'.$entry->getKey()) }}"
                  @if ($crud->hasUploadFields('update', $entry->getKey()))
                  enctype="multipart/form-data"
                    @endif
            >
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                <div class="box">
                    <div class="box-header with-border">
                    @if ($crud->model->translationEnabled())
                        <!-- Single button -->
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{trans('backpack::crud.language')}}: {{ $crud->model->getAvailableLocales()[$crud->request->input('locale')?$crud->request->input('locale'):App::getLocale()] }} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach ($crud->model->getAvailableLocales() as $key => $locale)
                                        <li><a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}?locale={{ $key }}">{{ $locale }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <h3 class="box-title" style="line-height: 30px;">{{ trans('backpack::crud.edit') }}</h3>
                        @else
                            <h3 class="box-title">{{ trans('backpack::crud.edit') }}</h3>
                        @endif
                    </div>
                    <div class="box-body row display-flex-wrap" style="display: flex;flex-wrap: wrap;">
                        <!-- load the view from the application if it exists, otherwise load the one in the package -->
                        @if(view()->exists('vendor.backpack.crud.form_content'))
                            @include('vendor.backpack.crud.form_content', ['fields' => $fields, 'action' => 'edit'])
                        @else
                            @include('crud::form_content', ['fields' => $fields, 'action' => 'edit'])
                        @endif
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <div id="saveActions" class="form-group">

                            <input type="hidden" name="save_action" value="{{ $saveAction['active']['value'] }}">
                            <a href="/admin/sync_article_for_lease_chotot/approval/{{$fields['id']['value']}}" class="btn btn-warning" style="background-color: #000000; border-color: #171615;"><span class="fa fa-check-square-o"></span> &nbsp;Duyệt tin này</a>
                            <div class="btn-group">

                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
                                    <span data-value="{{ $saveAction['active']['value'] }}">{{ $saveAction['active']['label'] }}</span>
                                </button>

                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aira-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">&#x25BC;</span>
                                </button>

                                <ul class="dropdown-menu">
                                    @foreach( $saveAction['options'] as $value => $label)
                                        <li><a href="javascript:void(0);" data-value="{{ $value }}">{{ $label }}</a></li>
                                    @endforeach
                                </ul>

                            </div>

                            <a href="{{ $crud->hasAccess('list') ? url($crud->route) : url()->previous() }}" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;{{ trans('backpack::crud.cancel') }}</a>
                        </div>


                    </div><!-- /.box-footer-->
                </div><!-- /.box -->
            </form>
        </div>
    </div>
@endsection
