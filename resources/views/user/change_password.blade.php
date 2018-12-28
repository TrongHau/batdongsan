<?php
use App\Library\Helpers;
$mySelf = Auth::user();
?>
@section('contentCSS')
@endsection
@extends('layouts.app')
@section('content')
    <style>
        .moduletitle, .moduletitle a {
            background: #055699;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            height: 30px;
            line-height: 30px;
            width: 100%;
            color: white;
            font-weight: bold;
            margin-top: 2px;
            padding-left: 10px;
            text-transform: uppercase;
            width: 740px;
        }
    </style>
    <div class="container-default">
        <div>
            {{--<script src="https://content.batdongsan.com.vn/Modules/Project/Scripts/Common.js" type="text/javascript"></script>--}}
            {{--<link rel="stylesheet" type="text/css" href="https://content.batdongsan.com.vn/trang-ca-nhan/css/userpage2016.css?v=20181218" media="all">--}}
            <div id="content-user">
                <input type="hidden" name="ctl00$MainContent$_userPage$hdfUserId1" id="hdfUserId1" value="1007909">
                <div class="has-bg-user">
                    <div id="column-left-user" style="width: 25%; float: left">
                        <div id="usercp">
                            <div class="white-background-new">
                                @include('user.right_sidebar_avatar', ['mySelf' => $mySelf])
                            </div>
                        </div>

                        <div class="clear">
                        </div>
                    </div>
                    <form action="/thong-tin-ca-nhan/thay-doi-mat-khau" enctype="multipart/form-data" method="POST">
                        <div id="column-no-right-user" style="width: 75%; float: left">

                            <div class="moduletitle">
                                Thay đổi mật khẩu
                            </div>
                            @if ($message = Session::get('success'))

                                <div id="MainContent__userPage_ctl00_plInform" class="panel-inform">
                                    <span><?php echo $message ?>!</span>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div id="MainContent__userPage_ctl00_plInform" class="panel-inform">
                                    <span><strong>Lỗi!</strong> <?php echo $message ?>.</span>
                                </div>
                            @endif
                            <table class="pwdtable" style="margin-top:20px;">
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
                                        <input type="password" id="current_password" value="{{old('current_password')}}" name="current_password" class="keycode" style="width:200px;">
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
                                        <input type="password" id="MainContent__userPage_ctl00_txtNewPass" {{old('password')}} class="keycode" id="password" name="password" style="width:200px;" aria-autocomplete="list">
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
                                        <input type="password" id="MainContent__userPage_ctl00_txtConfirmNewPass" name="repassword" {{old('repassword')}} id="repassword" class="keycode" style="width:200px;">
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
                                        <input type="submit" name="ctl00$MainContent$_userPage$ctl00$BtnSave" value="Lưu" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$MainContent$_userPage$ctl00$BtnSave&quot;, &quot;&quot;, true, &quot;g&quot;, &quot;&quot;, false, false))" id="MainContent__userPage_ctl00_BtnSave" class="button-blue" style="width:57px;"></td>
                                    <td></td>
                                </tr>
                                </tbody></table>
                            <div class="clear">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('contentJS')

@endsection