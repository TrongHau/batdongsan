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
                    <form action="/thong-tin-ca-nhan/thay-doi-ca-nhan" enctype="multipart/form-data" method="POST">
                        <div id="column-no-right-user" style="width: 75%; float: left">
                            <div class="moduletitle">
                                Thay đổi thông tin cá nhân
                            </div>
                            <div id="editIndividualForm" style="margin-top: 20px;">
                                <div id="MainContent__userPage_ctl00_plInform" class="panel-inform">
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
                                <table class="adminform" style="background-color: white; border: 0; width: 100%;">
                                    <tbody><tr>
                                        <td style="width: 100%; vertical-align: top;">
                                            <div class="blueborline">
                                                <span id="MainContent__userPage_ctl00_lblProfileTitle">Thông tin cá nhân</span>
                                            </div>
                                            <table class="tblInfo" style="width: 100%;">
                                                <tbody><tr>
                                                    <td style="width: 130px;">
                                                        <span id="MainContent__userPage_ctl00_lblFullname">Họ và tên</span>
                                                        <span style="color: #f00;">(*)</span>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="ctl00$MainContent$_userPage$ctl00$hdIndividualId" id="MainContent__userPage_ctl00_hdIndividualId" value="877377">
                                                        <input name="name" type="text" value="{{old('name') ?? $mySelf->name}}" maxlength="50" id="txtFullname" class="keycode capitalize" style="width:50%;">
                                                        @if ($errors->has('name'))
                                                            <span style="color: red;" id="errorFullName">{{ str_replace('name', 'họ tên', $errors->first('name')) }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span id="MainContent__userPage_ctl00_lblManualName">Tên thường gọi</span>
                                                    </td>
                                                    <td>
                                                        <input name="nick_name" type="text" value="{{old('nick_name') ?? $mySelf->nick_name}}" maxlength="50" id="txtManualName" class="keycode" style="width:50%;">
                                                        @if ($errors->has('nick_name'))
                                                            <span style="color: red;" id="errorFullName">{{ str_replace('nick name', 'tên thường gọi', $errors->first('nick_name')) }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span id="MainContent__userPage_ctl00_lblBirthDate">Ngày sinh</span>
                                                    </td>
                                                    <td>
                                                        <input name="birth_day" type="date" value="{{old('birth_day') ?? $mySelf->birth_day}}" id="MainContent__userPage_ctl00_txtBirthDates" class="datetimepicker keycode hasDatepicker" >
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
                                                        <input type="radio" name="gender" value="1" {{(old('gender') ?? $mySelf->gender) == 1 ? 'checked="checked"' : ''}} ><label for="MainContent__userPage_ctl00_rdMale">Nam</label>
                                                        <input type="radio" name="gender" value="0" {{(old('gender') ?? $mySelf->gender) == 0 ? 'checked="checked"' : ''}}><label for="MainContent__userPage_ctl00_rdFemale">Nữ</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span id="MainContent__userPage_ctl00_lblAddress">Địa chỉ</span>
                                                    </td>
                                                    <td style="padding-left: 0px">
                                                        <table style="width: 70%" class="changeInfo">
                                                            <tbody><tr>
                                                                <td>
                                                                    <span id="MainContent__userPage_ctl00_lblCities">Tỉnh/Thành phố</span><font color="red">(*)</font></td>
                                                                <td>
                                                                    <span id="MainContent__userPage_ctl00_lblDistricts">Quận/Huyện</span><font color="red">(*)</font></td>
                                                                <td>
                                                                    <span id="MainContent__userPage_ctl00_lblWards">Phường/Xã</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div id="divCity" class="comboboxs advance-select-box">
                                                                        <select id="select-province" name="province_id" class="advance-options select-province" style="min-width: 200px;border: 1px solid #CCC;">
                                                                            <option value="">--Chọn Tỉnh/Thành phố--</option>
                                                                            @foreach($province as $item)
                                                                                <option value="{{$item->id}}">{{$item->_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div id="divDistrict" class="comboboxs advance-select-box" title="">
                                                                        <select id="select-district" name="district_id" class="advance-options select-district" style="min-width: 200px;border: 1px solid #CCC;">
                                                                            <option value="0" class="advance-options" style="min-width: 168px;">--Chọn Quận/Huyện--</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div id="divWard" class="comboboxs advance-select-box" title="">
                                                                        <select class="advance-options select-ward" name="ward_id" id="select-ward" style="min-width: 200px;">
                                                                            <option value="0" class="advance-options" style="min-width: 168px;">--Chọn Phường/Xã--
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </td>
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
                                                                        <select class="advance-options select-street" name="street_id" id="select-street" style="min-width: 200px;">
                                                                            <option value="0" class="advance-options" style="min-width: 168px;">--Chọn Đường/Phố--
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td colspan="2" style="vertical-align: top;">
                                                                    <div class="comboboxs advance-select-box adv-search" title="" style="margin: inherit;width: 100%;">
                                                                        <input name="address" placeholder="" type="text" value="{{$mySelf->address}}" maxlength="200" id="txtAddress" class="keycode capitalize" style="width: 402px;">
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
                                            <table class="tblInfo" style="width: 100%;">
                                                <tbody><tr>
                                                    <td style="width: 130px;">
                                                        <span id="MainContent__userPage_ctl00_lblMobile">Số điện thoại chính</span>
                                                        <span style="color: #f00;">(*)</span>
                                                    </td>
                                                    <td>
                                                        <input name="phone" type="text" value="{{old('phone') ?? $mySelf->phone}}" maxlength="16" class="keycode" style="width:50%;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span id="MainContent__userPage_ctl00_lblAlternativeEmail">Email</span>
                                                        <span style="color: #f00;">(*)</span>
                                                    </td>
                                                    <td>
                                                        <input name="ctl00$MainContent$_userPage$ctl00$txtAlternativeEmail" type="text" value="{{$mySelf->email}}" maxlength="128" disabled="disabled" class="aspNetDisabled keycode" style="width:50%;">
                                                        <span id="lblEmailError" style="color:Red;"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span id="MainContent__userPage_ctl00_lblTax">Mã số thuế</span>
                                                    </td>
                                                    <td>
                                                        <input name="tax_code" value="{{old('tax_code') ?? $mySelf->tax_code}}" type="text" maxlength="128" id="txtTaxCode" class="keycode" style="width:50%;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span id="MainContent__userPage_ctl00_lblSkypeIM">Facebook</span>:
                                                    </td>
                                                    <td>
                                                        <input name="facebook" type="text" maxlength="50" value="{{old('facebook') ?? $mySelf->facebook}}" id="txtSkypeIM" class="keycode" style="width:50%;">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span id="MainContent__userPage_ctl00_lblSkypeIM">Skype IM</span>:
                                                    </td>
                                                    <td>
                                                        <input name="skype" type="text" maxlength="50" value="{{old('skype') ?? $mySelf->skype}}" id="txtSkypeIM" class="keycode" style="width:50%;">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Zalo:
                                                    </td>
                                                    <td>
                                                        <input name="zalo" type="text" value="{{old('zalo') ?? $mySelf->zalo}}" maxlength="12" id="txtZalo" class="keycode" onkeypress="return isNumberKey(event);" style="width:50%;">
                                                        &nbsp;
                                                        <span>(Số điện thoại đăng ký Zalo)</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Viber:
                                                    </td>
                                                    <td>
                                                        <input name="viber" value="{{old('viber') ?? $mySelf->viber}}" type="text" maxlength="12" id="txtViber" class="keycode" onkeypress="return isNumberKey(event);" style="width:50%;">
                                                        &nbsp;
                                                        <span>(Số điện thoại đăng ký Viber)</span>
                                                    </td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="aligncenter">
                                            <br/>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSave" value="Lưu lại" onclick="return Validation();" id="MainContent__userPage_ctl00_btnSave" class="button-blue">
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </div>
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
    <script>
        <?php
        if(old('province_id') ?? $mySelf->province_id) {
        ?>
        $(document).ready(function() {
            document.getElementById('select-province').value = <?php echo old('province_id') ?? $mySelf->province_id ?>;
            getDistrict(<?php echo old('province_id') ?? $mySelf->province_id ?>, '<?php echo old('district_id') ?? $mySelf->district_id ?>', '<?php echo old('ward_id') ?? $mySelf->ward_id ?>', '<?php echo old('street_id') ?? $mySelf->street_id ?>')
            <?php
                if(old('district_id') ?? $mySelf->district_id) {
                    ?>
                    getWard(' <?php echo old('district_id') ?? $mySelf->district_id ?>', ' <?php echo old('ward_id') ?? $mySelf->ward_id ?>', '<?php echo old('street_id') ?? $mySelf->street_id ?>');
                    <?php
                }
            ?>
        });
        <?php
        }
        ?>
    </script>
@endsection