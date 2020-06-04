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
                                        THAY ĐỔI THÔNG TIN CÁ NHÂN
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
                                            <form action="/thong-tin-ca-nhan/thay-doi-ca-nhan" enctype="multipart/form-data" method="POST">
                                                <table style="width: 100%; margin-top: 20px; border: none;" class="t-4-c table-search-article">
                                                <tbody><tr>
                                                    <td style="width: 100%; vertical-align: top;">
                                                        <div class="blueborline">
                                                            <span id="MainContent__userPage_ctl00_lblProfileTitle">Thông tin cá nhân</span>
                                                        </div>
                                                        <table style="width: 100%; margin-top: 20px; border: none;" class="t-4-c table-search-article">
                                                            <tbody><tr>
                                                                <td style="width: 140px;">
                                                                    <span id="MainContent__userPage_ctl00_lblFullname">Họ và tên</span>
                                                                    <span style="color: #f00;">(*)</span>
                                                                </td>
                                                                <td>
                                                                    <input type="hidden" name="ctl00$MainContent$_userPage$ctl00$hdIndividualId" id="MainContent__userPage_ctl00_hdIndividualId" value="877377">
                                                                    <input name="name" type="text" value="{{old('name') ?? $mySelf->name}}" maxlength="50" id="txtFullname" class="keycode capitalize form-control" style="width:50%;">
                                                                    @if ($errors->has('name'))
                                                                        <span style="color: red;" id="errorFullName">{{ str_replace('name', 'họ tên', $errors->first('name')) }}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span id="MainContent__userPage_ctl00_lblBirthDate">Ngày sinh</span>
                                                                </td>
                                                                <td>
                                                                    <input name="birth_day" type="date" style="width: 50%" value="{{old('birth_day') ? date('Y-m-d', strtotime(old('birth_day'))) : ($mySelf->birth_day ? date('Y-m-d', strtotime($mySelf->birth_day)) : '')}}" id="MainContent__userPage_ctl00_txtBirthDates" class="datetimepicker keycode hasDatepicker form-control" >
                                                                    @if ($errors->has('birth_day'))
                                                                        <span style="color: red;" id="errorFullName">{{ str_replace('birth day', 'ngày sinh', $errors->first('birth_day')) }}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span id="MainContent__userPage_ctl00_Label1">Giới tính</span>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="gender" value="1" {{(old('gender') ?? $mySelf->gender) == 1 ? 'checked="checked"' : ''}} ><label for="MainContent__userPage_ctl00_rdMale">&nbsp;Nam</label>
                                                                    <input type="radio" name="gender" value="0" {{(old('gender') ?? $mySelf->gender) == 0 ? 'checked="checked"' : ''}}><label for="MainContent__userPage_ctl00_rdFemale">&nbsp;Nữ</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span id="MainContent__userPage_ctl00_lblAddress">Địa chỉ</span>
                                                                </td>
                                                                <td style="padding-left: 0px">
                                                                    <table style="width: 100%; margin-top: 20px; border: none;" class="t-4-c table-search-article">
                                                                        <tbody><tr>
                                                                            <td>
                                                                                <span id="MainContent__userPage_ctl00_lblCities">Tỉnh/Thành phố</span>
                                                                                {{--<font color="red">(*)</font>--}}
                                                                            </td>
                                                                            <td>
                                                                                <span id="MainContent__userPage_ctl00_lblDistricts">Quận/Huyện</span>
                                                                                {{--<font color="red">(*)</font>--}}
                                                                            </td>
                                                                            <td>
                                                                                <span id="MainContent__userPage_ctl00_lblWards">Phường/Xã</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div id="divCity" class="comboboxs advance-select-box">
                                                                                    <select id="select-province" name="province_id" class="advance-options select-province form-control" style="min-width: 200px;border: 1px solid #CCC;">
                                                                                        <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                                                                        @foreach($province as $item)
                                                                                            <option value="{{$item->id}}">{{$item->_name}}</option>
                                                                                        @endforeach
                                                                                    </select>

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div id="divDistrict" class="comboboxs advance-select-box" title="">
                                                                                    <select id="select-district" name="district_id" class="advance-options select-district form-control" style="min-width: 200px;border: 1px solid #CCC;">
                                                                                        <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Quận/Huyện --</option>
                                                                                    </select>

                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div id="divWard" class="comboboxs advance-select-box" title="">
                                                                                    <select class="advance-options select-ward form-control" name="ward_id" id="select-ward" style="min-width: 200px;">
                                                                                        <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Phường/Xã --
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                @if ($errors->has('province_id'))
                                                                                    <span style="color: red;" id="errorFullName">{{ str_replace('province id', 'Tỉnh/Thành phố', $errors->first('province_id')) }}</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                @if ($errors->has('district_id'))
                                                                                    <span style="color: red;" id="errorFullName">{{ str_replace('district id', 'Quận/Huyện', $errors->first('district_id')) }}</span>
                                                                                @endif
                                                                            </td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span id="MainContent__userPage_ctl00_lblStreets">Đường/Phố</span></td>
                                                                            <td colspan="2">
                                                                                <span id="MainContent__userPage_ctl00_Label2">Địa chỉ</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div id="divStreet" class="comboboxs advance-select-box adv-search" title="">
                                                                                    <select class="advance-options select-street form-control" name="street_id" id="select-street" style="min-width: 200px;">
                                                                                        <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Đường/Phố --
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td colspan="2" style="vertical-align: top;">
                                                                                <div class="comboboxs advance-select-box adv-search" title="" style="margin: inherit;width: 100%;">
                                                                                    <input name="address" placeholder="" type="text" value="{{$mySelf->address}}" maxlength="200" id="txtAddress" class="keycode capitalize form-control">
                                                                                </div>
                                                                                <span id="MainContent__userPage_ctl00_lblAddressError" class="error-message"></span>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody></table>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="blueborline">
                                                            <span id="MainContent__userPage_ctl00_lblContactInfo">Thông tin liên hệ</span>
                                                        </div>
                                                        <table style="width: 100%; margin-top: 20px; border: none;" class="t-4-c table-search-article">
                                                            <tbody><tr>
                                                                <td style="width: 140px;">
                                                                    <span id="MainContent__userPage_ctl00_lblMobile">Số điện thoại chính</span>
                                                                    <span style="color: #f00;">(*)</span>
                                                                </td>
                                                                <td>
                                                                    <input name="phone" disabled type="text" value="{{old('phone') ?? $mySelf->phone}}" maxlength="16" class="keycode input_phone form-control" style="width:50%; display: inherit;">
                                                                    @if ($errors->has('phone'))
                                                                        <span style="color: red;" id="errorFullName">{{ str_replace('phone', 'số điện thoại', $errors->first('phone')) }}</span>
                                                                    @endif
                                                                    <a id="MainContent__userPage_ctl00_lnkVerifyPrimaryNumber" class="button-blue" onclick="AddNumberPhone()" href="javascript:void(0)">Đăng ký số điện thoại mới</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span id="MainContent__userPage_ctl00_lblAlternativeEmail">Email</span>
                                                                    <span style="color: #f00;">(*)</span>
                                                                </td>
                                                                <td>
                                                                    <input name="ctl00$MainContent$_userPage$ctl00$txtAlternativeEmail" type="text" value="{{$mySelf->email}}" maxlength="128" disabled="disabled" class="aspNetDisabled keycode form-control" style="width:50%; display: inherit;">
                                                                    <span id="lblEmailError" style="color:Red;"></span>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center">
                                                        <br/>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSave" value="Lưu lại" id="MainContent__userPage_ctl00_btnSave" class="button-blue">
                                                    </td>
                                                </tr>
                                                </tbody></table>
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
    <div id="verifyPopupContainer" class="modal fade" role="dialog" style="top: 50px;">
        <div class="verifyPopup modal-dialog">
            <!-- Modal content-->
            <div class="verifyPopupClose fa fa-close close" data-dismiss="modal"></div>
            <div class="modal-content">
                <div class="verifyPopupTitle">thêm số điện thoại đăng tin</div>
                <div class="verifyPopupContent">
                    <table style="width: 100%; margin-top: 20px; border: none;" class="t-4-c table-search-article">
                        <tbody>
                        <tr>
                            <td style="width:100px;"></td>
                            <td><input class="form-control" type="number" max="9999999999" min="0" placeholder="Nhập số điện thoại bạn muốn thêm vào hồ sơ " id="txtNumberPhone"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="lblPopupNumberError"></div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <img src="/captcha/image.php" id="img-captcha" style="float: left;border: 1px solid #e8e8e8;"/>
                                <img type="button" src="/imgs/icon-reload.png" id="reload-img-captcha" value="Reload" onclick="$('#img-captcha').attr('src', '/captcha/image.php?rand=' + Math.random())"  style="float: left; margin-top: 7px; margin-left: 5px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input placeholder="Nhập mã an toàn" type="text" id="captcha" value="" class="form-control"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="button" style="font-weight: 700" class="button-blue1" value="Lấy mã xác thực" onclick="SendVerifyOTP()"
                                       id="btnPopupSendOTP"> <span id="lblSMSPopupPrice">Miễn phí</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="lblPopupSendOTPMessage" style="display:none;">Mã xác thực đã được gửi đến số điện thoại <span id="lblMobile">xxxx xxx xxx</span> <br>Thời gian nhập mã xác thực còn lại:
                                    <span id="lblTimeout">05 phút</span></div>
                                <div id="lblPopupSendOTPError"></div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="number" style="font-weight: 700" min="0" class="form-control" max="999999" placeholder="Nhập mã số bạn nhận được qua SMS" id="txtOTP">
                            </td>
                            <td>
                                <input type="button" class="button-blue1" value="Xác thực" onclick="VerifyOTPNumberPhone()">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="lblPopupOTPError"></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        .verifyPopup .modal-content {
            all: initial;
        }
    </style>
    <script>
        <?php
        if(old('province_id') ?? $mySelf->province_id) {
        ?>
        $(document).ready(function() {
            document.getElementById('select-province').value = '<?php echo old('province_id') ?? $mySelf->province_id ?? '' ?>';
            getDistrict('<?php echo old('province_id') ?? $mySelf->province_id ?? '' ?>', '<?php echo old('district_id') ?? $mySelf->district_id ?? '' ?>', '<?php echo old('ward_id') ?? $mySelf->ward_id ?? '' ?>', '<?php echo old('street_id') ?? $mySelf->street_id ?? '' ?>');
            <?php
            if(old('district_id') ?? $mySelf->district_id ?? false) {
            ?>
            getWard(' <?php echo old('district_id') ?? $mySelf->district_id ?? '' ?>', ' <?php echo old('ward_id') ?? $mySelf->ward_id ?? '' ?>', '<?php echo old('street_id') ?? $mySelf->street_id ?? '' ?>');
            <?php
            }
            ?>
        });
        <?php
        }
        ?>
        $('.select-province').change(function() {
            $('#txtAddress').val('');
        });
        $('.select-district').change(function() {
            $('#txtAddress').val($('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
        $('.select-ward').change(function() {
            $('#txtAddress').val('Phường ' + $('.select-ward option:selected').text() + ', ' + $('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
        $('.select-street').change(function() {
            $('#txtAddress').val('Đường ' + $('.select-street option:selected').text() + ', ' + $('.select-ward option:selected').text() + ', ' + $('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });

        function AddNumberPhone() {
            $("#verifyPopupContainer").modal();
            // $("#myModal").modal();
        }
        function SendVerifyOTP() {
            if(!$('#txtNumberPhone').val() || $('#txtNumberPhone').val().length < 5) {
                $('#lblPopupSendOTPError').html('Vui lòng điền số điện thoại.');
                return false;
            }
            if(!$('#captcha').val()) {
                $('#lblPopupSendOTPError').html('Vui lòng xác nhận mã an toàn trước khi lấy mã xác thực.');
                return false;
            }
            $.ajax({
                url: '/thong-tin-ca-nhan/xac-nhan-so-dien-thoai-moi',
                type: "GET",
                dataType: "json",
                data: {
                    phone: $('#txtNumberPhone').val(),
                    type: 'update_profile',
                    captcha: $('#captcha').val(),
                },
                beforeSend: function () {
                    if(loaded) return false;
                    loaded = true;
                    $('#lblPopupSendOTPError').html('');
                    $('#lblPopupOTPError').html('');
                    $('#lblPopupSendOTPMessage').css('display', 'none');
                },
                success: function(response) {
                    if(response.success) {
                        $('#lblMobile').html(response.data.phone);
                        $('#lblTimeout').html(response.data.expried);
                        $('#lblPopupSendOTPMessage').css('display', 'block');
                    }else{
                        $('#lblPopupSendOTPError').html(response.message);
                    }
                    $('#reload-img-captcha').click();
                    $('#captcha').val('')
                }
            });
        }
        function VerifyOTPNumberPhone() {
            if(!$('#txtNumberPhone').val() || $('#txtNumberPhone').val().length < 5) {
                $('#lblPopupSendOTPError').html('Vui lòng điền số điện thoại.');
                return false;
            }
            if(!$('#txtOTP').val() || $('#txtNumberPhone').val().length < 4) {
                $('#lblPopupOTPError').html('Vui lòng điền chính xác mã xác thực.');
                return false;
            }

            $.ajax({
                url: '/thong-tin-ca-nhan/xac-nhan-so-dien-thoai-moi',
                type: "POST",
                dataType: "json",
                data: {
                    phone: $('#txtNumberPhone').val(),
                    otp: $('#txtOTP').val(),
                },
                beforeSend: function () {
                    if(loaded) return false;
                    loaded = true;
                    $('#lblPopupSendOTPError').html('');
                    $('#lblPopupOTPError').html('');
                    $('#lblPopupSendOTPMessage').css('display', 'none');
                },
                success: function(response) {
                    if(response.success) {
                        $('#verifyPopupContainer').click();
                        $('#txtNumberPhone').val('');
                        $('#txtOTP').val('');
                        $('.input_phone').val(response.data.phone);
                        alertModal(response.message);
                    }else{
                        $('#lblPopupOTPError').html(response.message);
                    }
                }
            });
        }
    </script>
@endsection