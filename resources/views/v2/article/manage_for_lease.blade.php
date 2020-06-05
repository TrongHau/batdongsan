<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
$mySelf = Auth::user();
?>
@section('contentCSS')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@extends('v2.layouts.app')
@section('content')
    <style type="text/css">
        .tblKM {
            width: 750px;
            border-collapse: collapse;
        }
        .tblKM tr:hover {
            background-color: #cdcdcd;
        }
        .tblKM td {
            padding: 3px;
        }
        .tblKM th {
            padding: 3px;
            font-size: 14px;
            font-weight: bold;
        }
        .tblKM tr td:last-child {
            text-align: right;
        }
        .table-search-article>thead>tr>th, .table-search-article>thead>tr>td, .table-search-article>tbody>tr>th, .table-search-article>tbody>tr>td, .table-search-article>tfoot>tr>th, .table-search-article>tfoot>tr>td, .table-bordered>thead>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>tfoot>tr>td{
            border: none;
        }
        .main-container .form-control {
            line-height: inherit;
            border: 1px solid #ddd;
            height: 32px;
            padding: 5px 5px;
            color: #000000;
        }
        .table-search-article>tbody>tr>td {
            padding-left: 0px;
            padding-top: 0px;
        }
    </style>
    <body class="archive post-type-archive post-type-archive-property image-lazy-loading wpb-js-composer js-comp-ver-5.1.1 vc_responsive">
    <div class="apus-page-loading" style="display: none;">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
    <div id="wrapper-container" class="wrapper-container">
        @include('v2.layouts.header_logo')
        <div id="apus-main-content"> <div class="properties-archive-main-container">
                <section id="main-container" class="main-content inner">
                    @include('v2.catalog.wapper_search')
                    <div class="container main-container">
                        <div class="main-content-header-middle clearfix">
                            <div class="col-md-3" style="display: inline-flex; padding-left: 0px;">
                                @include('v2.user.left_sidebar_avatar', ['mySelf' => $mySelf])
                            </div>
                            <div class="col-md-9" style="display: inline-flex; padding-right: 0px">
                                <div class="property-content" style="margin: 25px 0 30px; width: 100%;">
                                    <div class="agent-small-inner title_sidebar_top_left">
                                        QUẢN LÝ TIN RAO BÁN, CHO THUÊ
                                    </div>
                                    <table style="width: 100%; margin-top: 20px; border: none;" class="t-4-c table-search-article">
                                        <tbody>
                                        <tr>
                                            <td class="colorblue">Từ ngày</td>
                                            <td class="colorblue">Đến ngày</td>
                                            <td class="colorblue">Mã tin</td>
                                            <td class="colorblue">Trạng thái</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input value="{{date('Y-m-d', strtotime('-2 months'))}}" name="date_from" type="date" value="22/06/2018" id="date_from" class="hasDatepicker keycode form-control">
                                            </td>
                                            <td>
                                                <input value="{{date("Y-m-d")}}" name="date_to" type="date" value="23/12/2018" id="date_to" class="hasDatepicker keycode form-control">
                                            </td>
                                            <td>
                                                <input placeholder="Áp dụng với bài viết của bạn" name="code" type="text" id="code" class="keycode form-control">
                                            </td>
                                            <td>
                                                <div id="divProductType" class="comboboxs advance-select-box pad0">
                                                    <select class="select-text form-control" name="aprroval" id="aprroval">
                                                        <option selected="selected" value="-1">Tất cả</option>
                                                        <option value="{{APPROVAL_ARTICLE_PUBLIC}}">Đã duyệt</option>
                                                        <option value="{{APPROVAL_ARTICLE_PENĐING}}">Chưa duyệt</option>
                                                        <option value="{{APPROVAL_ARTICLE_DELETE}}">Đã bị xóa</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSearch" value="Tìm kiếm" onclick="doReadySearch();" id="MainContent__userPage_ctl00_btnSearch" class="timkiem" autopostback="true">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div id="list_article">
                                        <?php echo $list ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> </div>
        </div>
    </div>
    @include('v2.layouts.footer')
    </body>
@endsection
@section('contentJS')
    <script>
        function doReadySearch() {
            getList('/quan-ly-tin/tin-cho-thue');
        }
        function deleteArticle(code) {
            var r = confirm("Bạn có chắc muốn xóa tin này không?");
            if (r == true) {
                $.ajax({
                    url: "/thong-tin-ca-nhan/xoa-tin",
                    type: "POST",
                    dataType: "json",
                    data: {code: code, type: 1},
                    beforeSend: function () {
                        if(loaded) return false;
                        loaded = true;
                    },
                    success: function(data) {
                        if(data.success) {
                            successModal(data.message);
                            $('#item-'+code).remove();
                        }else {
                            alertModal(data.message);
                        }
                    }
                });
            }

        }
        function getAllNote(content) {
            alertModal(content ? content : 'Không có thông báo nào.');
        }
        $('#list_article').find('.pagination li a').on('click', function (e) {
            e.preventDefault();
            getList($(this).attr('href'));
        });
        function getList(url) {
            $.ajax({
                url: url,
                type: "POST",
                dataType: "html",
                data: {
                    date_from: $('#date_from').val(),
                    date_to: $('#date_to').val(),
                    code: $('#code').val(),
                    aprroval: $('#aprroval').val(),
                },
                beforeSend: function () {
                    if(loaded) return false;
                    loaded = true;
                },
                success: function(response) {
                    $('#list_article').html(response);
                    $('#list_article').find('.pagination li a').on('click', function (e) {
                        e.preventDefault();
                        getList($(this).attr('href'));
                    });
                }
            });
        }
    </script>
@endsection