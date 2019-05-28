@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            <span class="text-capitalize">Lấy Tin Rao Cho Thuê</span>
        </h1>
        <ol class="breadcrumb">
            <li><a href="http://batdongsan.localhost/admin/dashboard">Admin</a></li>
            <li><a href="http://batdongsan.localhost/admin/sync_article" class="text-capitalize">Lấy Tin Rao Cho Thuê</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Default box -->
                <a href="/admin/sync_article_for_lease" class="hidden-print"><i class="fa fa-angle-double-left"></i> Back to all  <span>Lấy Tin Rao Cho Thuê</span></a><br><br>


                <form method="post" action="/admin/sync_article_for_lease/sync_post_article">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">Bắt đầu lấy tin tức</h3>
                        </div>
                        <div class="box-body row display-flex-wrap" style="display: flex; flex-wrap: wrap;">
                            <!-- load the view from the application if it exists, otherwise load the one in the package -->
                            <!-- load the view from type and view_namespace attribute if set -->

                            <!-- text input -->
                            <div class="form-group col-xs-2">
                                <label>Web tin</label>
                                <select name="type" class="form-control">
                                    <option value="bds.com.vn">Batdongsan.com.vn</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-2">
                                <label>Số trang</label>
                                <input type="number" name="page" class="form-control" value="1">
                            </div>
                            <div class="form-group col-xs-4">
                                <label>Bắt đầu đăng tin</label>
                                <input type="datetime-local" id="meeting-time" class="form-control"
                                       name="start_date" value="{{date('Y-m-d', strtotime('-1 day'))}}T{{date('H:i')}}">
                            </div>
                            <div class="form-group col-xs-4">
                                <label>Kết thúc tin đăng</label>
                                <input type="datetime-local" id="meeting-time" class="form-control"
                                       name="end_date" value="{{date('Y-m-d')}}T{{date('H:i')}}">
                            </div>
                        </div>
                        <div class="box-footer">

                            <div id="saveActions" class="form-group">

                                <button type="submit" class="btn btn-success" value="" ><span class="fa fa-cloud-download"></span> &nbsp;Bắt đầu lấy tin</button>
                                <a href="/admin/sync_article" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;Cancel</a>
                            </div>

                        </div><!-- /.box-footer-->

                    </div><!-- /.box -->
                </form>
            </div>
        </div>


    </section>
@endsection
