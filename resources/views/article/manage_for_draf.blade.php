<?php
use App\Library\Helpers;
$mySelf = Auth::user();
?>
@extends('layouts.app')
@section('content')
    <div class="container-default">
        <div>
            <link rel="stylesheet" type="text/css" href="/css/manage_article.css" media="all">
            <div id="content-user">
                <input type="hidden" name="ctl00$MainContent$_userPage$hdfUserId1" id="hdfUserId1" value="1007909">
                <div class="has-bg-user">
                    <div id="column-left-user" style="width: 25%; float: left">
                        <div id="usercp">
                            <div class="white-background-new">
                                @include('user.left_sidebar_avatar', ['mySelf' => $mySelf])
                            </div>
                        </div>

                    </div>
                    <div id="column-no-right-user" style="width: 75%; float: left">

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
                        </style>
                        <div class="aligncenter">

                        </div>

                        <div class="moduletitle">
                            Quản lý tin nháp
                        </div>
                        <table style="width: 100%; margin-top: 20px;" class="t-4-c">
                            <tbody>
                            <tr>
                                <td class="colorblue">Từ ngày</td>
                                <td class="colorblue">Đến ngày</td>
                                <td class="colorblue">Mã tin</td>
                                <td class="colorblue">Trạng thái</td>
                            </tr>
                            <tr>
                                <td>
                                    <input value="{{date('Y-m-d', strtotime('-2 months'))}}" name="date_from" type="date" value="22/06/2018" id="date_from" class="hasDatepicker keycode">
                                </td>
                                <td>
                                    <input value="{{date("Y-m-d")}}" name="date_to" type="date" value="23/12/2018" id="date_to" class="hasDatepicker keycode">
                                </td>
                                <td>
                                    <input placeholder="Áp dụng với bài viết của bạn" name="code" type="text" id="code" class="keycode">
                                </td>
                                <td>
                                    <div id="divProductType" class="comboboxs advance-select-box pad0">
                                        <select class="select-text" name="aprroval" id="aprroval">
                                            <option selected="selected" value="-1">Tất cả</option>
                                            <option value="{{APPROVAL_ARTICLE_PUBLIC}}">Đã duyệt</option>
                                            <option value="{{APPROVAL_ARTICLE_PENĐING}}">Chưa duyệt</option>
                                            <option value="{{APPROVAL_ARTICLE_DELETE}}">Đã bị xóa</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSearch" value="Tìm kiếm" onclick="doReadySearch();" id="MainContent__userPage_ctl00_btnSearch" class="timkiem" autopostback="true">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="clear10"></div>
                        <div id="list_article">
                            <?php echo $list ?>
                        </div>
                        <div class="clear10"></div>
                        <input type="hidden" name="ctl00$MainContent$_userPage$ctl00$hddPageViewData" id="hddPageViewData" value="9fLJVubxXI8tONW9Zh5KSg%3d%3d">

                        <div class="clear">
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
        </div>
    </div>
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