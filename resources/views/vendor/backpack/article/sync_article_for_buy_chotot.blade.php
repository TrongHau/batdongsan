@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            <span class="text-capitalize">Lấy Tin Rao Cho Thuê</span>
        </h1>
        <ol class="breadcrumb">
            <li><a href="http://batdongsan.localhost/admin/dashboard">Admin</a></li>
            <li><a href="http://batdongsan.localhost/admin/sync_article" class="text-capitalize">Lấy Tin Rao Mua - Cần Thuê Chotot</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Default box -->
                <a href="/admin/sync_chotot_article_for_buy" class="hidden-print"><i class="fa fa-angle-double-left"></i> Back to all  <span>Lấy Tin Rao Cho Thuê Chotot</span></a><br><br>


                <form method="post" action="/admin/sync_chotot_article_for_buy/sync_post_article">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">Bắt đầu lấy tin tức</h3>
                        </div>
                        <div class="box-body row display-flex-wrap" style="display: flex; flex-wrap: wrap;">
                            <!-- load the view from the application if it exists, otherwise load the one in the package -->
                            <!-- load the view from type and view_namespace attribute if set -->

                            <!-- text input -->
                            <div class="form-group col-xs-4">
                                <label>Thể loại</label>
                                <select name="method_article" class="form-control">
                                    <option value="Nhà đất cần mua">Nhà đất cần mua</option>
                                    <option value="Nhà đất cần thuê">Nhà đất cần thuê</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-4">
                                <label>Danh Mục</label>
                                <select name="type_article" class="form-control">
                                    <option value="Mua căn hộ chung cư">Mua căn hộ chung cư</option>
                                    <option value="Mua nhà riêng">Nhà ở</option>
                                    <option value="Mua đất">Đất</option>
                                    <option value="Mua loại bất động sản khác">Văn phòng, Mặt bằng kinh doanh</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12">
                                <label>Nhập mã code tin rao mua chotot</label>
                                <textarea name="str_html" class="form-control" rows="15"></textarea>
                            </div>
                        </div>
                        <div class="box-footer">

                            <div id="saveActions" class="form-group">

                                <button type="submit" class="btn btn-success" value="" ><span class="fa fa-cloud-download"></span> &nbsp;Bắt đầu lấy tin</button>
                                <a href="/admin/sync_article_for_lease_chotot" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;Cancel</a>
                            </div>

                        </div><!-- /.box-footer-->

                    </div><!-- /.box -->
                </form>
            </div>
        </div>


    </section>
@endsection
