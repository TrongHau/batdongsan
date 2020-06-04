<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
$mySelf = Auth::user();
?>
@section('contentCSS')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" type="text/css" href="/css/slidershow.css">
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
        .form-control {
            line-height: inherit;
            border: 1px solid #ddd;
            height: 32px;
            padding: 5px 5px;
        }
        .table-search-article>tbody>tr>td {
            padding-left: 0px;
            padding-top: 0px;
        }
        table, th, td {
            vertical-align: middle;
        }
        table>thead>tr>th, table>thead>tr>td, table>tbody>tr>th, table>tbody>tr>td, table>tfoot>tr>th, table>tfoot>tr>td, .table>thead>tr>th, .table>thead>tr>td, .table>tbody>tr>th, .table>tbody>tr>td, .table>tfoot>tr>th, .table>tfoot>tr>td {
            vertical-align: inherit!important;
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
                <section id="main-container" class="main-content  inner">
                    <div class="container">
                        <div class="main-content-header-middle clearfix">
                            <div class="col-md-3" style="display: inline-flex; padding-left: 0px;">
                                @include('v2.user.left_sidebar_avatar', ['mySelf' => $mySelf])
                            </div>
                            <div class="col-md-9" style="display: inline-flex; padding-right: 0px">
                                <div class="property-content" style="margin: 25px 0 30px; width: 100%;">
                                    <div class="agent-small-inner title_sidebar_top_left">
                                        Thay đổi mật khẩu
                                    </div>
                                    <div id="list_article">
                                        <div id="editIndividualForm" style="margin-top: 20px;">
                                            <div id="MainContent__userPage_ctl00_plInform" class="panel-inform">
                                            </div>
                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success" role="alert">
                                                    <?php echo $message ?>!
                                                </div>
                                            @endif
                                            @if ($message = Session::get('error'))
                                                <div class="alert alert-danger" role="alert">
                                                    <span><strong>Lỗi!</strong> <?php echo $message ?>.</span>
                                                </div>
                                            @endif
                                            <form action="/thong-tin-ca-nhan/thay-doi-mat-khau" enctype="multipart/form-data" method="POST">
                                                <table style="width: 100%; margin-top: 20px; border: none;" class="t-4-c table-search-article">
                                                        <tbody><tr>
                                                            <td></td>
                                                            <td colspan="2">

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:100px;">
                                                                Mật khẩu cũ
                                                            </td>
                                                            <td>
                                                                <input type="password" id="current_password" value="{{old('current_password')}}" name="current_password" class="keycode form-control" style="width:200px;">
                                                                @if ($errors->has('current_password'))
                                                                    <span style="color: red;" id="errorFullName">{{ str_replace('current password', 'mật khẩu hiện tại', $errors->first('current_password')) }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span id="MainContent__userPage_ctl00_RequiredFieldValidator1" style="color:Red;display:none;">Bạn chưa nhập mật khẩu cũ</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td colspan="2">
                                                                Nếu bạn quên mật khẩu hoặc đăng nhập bằng Facebook, Google mà không cần đăng ký thì hãy thoát khỏi tài khoản, sau đó sử dụng chức năng lấy lại mật khẩu để lấy mật khẩu hiện tại.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Mật khẩu mới
                                                            </td>
                                                            <td>
                                                                <input type="password" id="MainContent__userPage_ctl00_txtNewPass" class="keycode form-control" id="password" name="password" style="width:200px;" aria-autocomplete="list">
                                                                @if ($errors->has('password'))
                                                                    <span style="color: red;" id="errorFullName">{{ str_replace('password', 'mật khẩu mới', $errors->first('password')) }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span id="MainContent__userPage_ctl00_RequiredFieldValidator2" style="color:Red;display:none;">Bạn chưa nhập mật khẩu mới</span>

                                                                <span id="MainContent__userPage_ctl00_val1" style="color:Red;display:none;">Mật khẩu phải có độ dài tối thiểu 6 ký tự, có ít nhất 1 ký tự viết hoa và 1 chữ số</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Gõ lại mật khẩu
                                                            </td>
                                                            <td>
                                                                <input type="password" id="MainContent__userPage_ctl00_txtConfirmNewPass" name="repassword" id="repassword" class="keycode form-control" style="width:200px;">
                                                                @if ($errors->has('repassword'))
                                                                    <span style="color: red;" id="errorFullName">{{ str_replace('repassword', 'gõ lại mật khẩu', $errors->first('repassword')) }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span id="MainContent__userPage_ctl00_CompareValidator1" style="color:Red;display:none;">Mật khẩu không giống nhau</span>
                                                                <span id="MainContent__userPage_ctl00_RequiredFieldValidator3" style="color:Red;display:none;"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" name="ctl00$MainContent$_userPage$ctl00$BtnSave" value="Lưu" id="MainContent__userPage_ctl00_BtnSave" class="button-blue" style="width:57px;"></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                </table>
                                            </form>
                                        </div>
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

@endsection