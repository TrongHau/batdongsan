<?php
use App\Library\Helpers;
$mySelf = Auth::user();
session_start();
global $province;
?>
@include('cache.province')
@section('contentCSS')
    <link rel="stylesheet" type="text/css" href="/css/dang-tin.css">
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <style>
        .fileinput-button {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .fileinput-button input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            -ms-filter: 'alpha(opacity=0)';
            font-size: 200px !important;
            direction: ltr;
            cursor: pointer;
        }
        .white-background-new .box-header {
            background: #055699;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            height: 30px;
            line-height: 30px;
            width: 100%;
            color: white;
            font-weight: bold;
            text-align: center;
        }
        [hidden],
        template {
            display: none!important;
        }
        .label_change_avatar {
            padding: 14px 12px!important;
            font-weight: 100;
        }
        .h1, .h2, .h3, h1, h2, h3 {
            margin-top: 0px!important;
            margin-bottom: 0px!important;
            font-weight: 700;
            font-family: Calibri;
            line-height: unset;
        }
        h3 {
            font-family: Tahoma;
            font-size: 13px;
        }
        .useravatar a.bluebotton {
            width: 140px!important;;
        }
        .orangebutton {
            background-image: url(/imgs/bg-ogrange-button.png);
        }
    </style>
@endsection
@extends('layouts.app')
@section('content')
        <div class="container-default">
            <div>
                <div id="content-user">
                    <input type="hidden" name="ctl00$MainContent$_userPage$hdfUserId1" id="hdfUserId1" value="1007909">
                    <div class="has-bg-user">
                        <div id="column-left-user" style="width: 25%; float: left">
                            <div id="usercp">
                                <div class="white-background-new">
                                    @include('user.left_sidebar_avatar_guest', ['mySelf' => $mySelf])
                                </div>
                            </div>

                            <div class="clear">
                            </div>
                        </div>
                        <div id="column-no-right-user" style="width: 75%; float: left">
                            <form action="/guest/quan-ly-tin/dang-tin-ban-cho-thue" enctype="multipart/form-data" class="form_submit" method="POST">
                                <div class="post-product">
                                    <div id="user_manage_product" style="border: none;">
                                        <div id="divPostNews">
                                            <div class="post-bg-Title mgt10">
                                                @if(isset($article->id))
                                                    <h1>Chỉnh sửa tin rao bán, cho thuê nhà đất</h1>
                                                @else
                                                    <h1>Đăng tin rao bán, cho thuê nhà đất</h1>
                                                @endif
                                                <div>
                                                    (Quý vị nhập thông tin nhà đất cần bán hoặc cho thuê vào các mục dưới đây)
                                                </div>
                                            </div>
                                            <div class="rowHeader">
                                                <h2>Thông tin cơ bản</h2>
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
                                            <div class="rowContent">
                                                <div class="rowContentLeft">
                                                    <div class="rowPost">
                                                        <div style="color: #f00; text-align: center; padding-bottom: 20px;">
                                                            <span id="MainContent__userPage_ctl00_lblServerErrorMsg"></span>
                                                        </div>
                                                        <div class="leftArea leftPostArea">
                                                            <div id="labeltitle">
                                                                <label>
                                                                    Tiêu đề(<span class="redfont">*</span>):</label>
                                                            </div>
                                                            <div class="input">
                                                                <input name="title" placeholder="Vui lòng nhập tiêu đề tin đăng của bạn. Tối thiểu là 30 ký tự và tối đa là 99 ký tự." value="{{old('title') ?? $article->title ?? ''}}" type="text" id="txtTitle" class="text-field has-help required countTypeLength" onchange="enableSmsOtp()" maxlength="99" minlength="30">
                                                                <span class="txtProductTitle_count" style="float: left; margin-left: 10px;">99</span>
                                                                @if ($errors->has('title'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('title', 'tiêu đề', $errors->first('title')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="clear">
                                                        </div>
                                                    </div>
                                                    <div class="postrow padbt10">
                                                        <div class="base1">
                                                            Hình thức(<span class="redfont">*</span>)
                                                        </div>
                                                        <div class="base2">
                                                            <div id="divProductType" class="comboboxs advance-select-box pad0">
                                                                <select id="method_article" name="method_article" class="advance-options" style="min-width: 220px;border: 1px solid #CCC;"  onchange="typeMethod(this.value);">
                                                                    <option value="" class="advance-options" style="min-width: 195px;">-- Hình thức --</option>
                                                                    <option value="Nhà đất bán" class="advance-options" style="min-width: 195px;">Nhà đất bán</option>
                                                                    <option value="Nhà đất cho thuê" class="advance-options" style="min-width: 195px;">Nhà đất cho thuê</option>
                                                                </select>
                                                                @if ($errors->has('method_article'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('method article', 'hình thức', $errors->first('method_article')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="base1">
                                                            Loại(<span class="redfont">*</span>)
                                                        </div>
                                                        <div class="base4">

                                                            <div id="divProductCate" class="comboboxs advance-select-box pad0">
                                                                <select id="type_article" name="type_article" class="advance-options" onchange="enableSmsOtp()" style="min-width: 220px;border: 1px solid #CCC;">
                                                                    <option value="" class="advance-options" style="min-width: 195px;">-- Phân mục --</option>
                                                                </select>
                                                                @if ($errors->has('type_article'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('type article', 'loại', $errors->first('type_article')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="postrow padbt10">
                                                        <div class="base1">
                                                            Tỉnh/Thành phố(<span class="redfont">*</span>)
                                                        </div>
                                                        <div class="base2">

                                                            <div id="divCity" class="comboboxs advance-select-box pad0">
                                                                <select id="select-province" name="province_id" class="advance-options select-province" onchange="enableSmsOtp()" style="min-width: 220px;border: 1px solid #CCC;">
                                                                    <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                                                    @foreach($province as $item)
                                                                        <option value="{{$item['id']}}">{{$item['_name']}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('province_id'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('province id', 'Tỉnh/Thành phố', $errors->first('province_id')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="base1">
                                                            Quận/Huyện(<span class="redfont">*</span>)
                                                        </div>
                                                        <div class="base4">

                                                            <div id="divDistrict" class="comboboxs advance-select-box pad0">
                                                                <select name="district_id" class="advance-options select-district" onchange="enableSmsOtp()" style="min-width: 220px;border: 1px solid #CCC;">
                                                                    <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Quận/Huyện --</option>
                                                                </select>
                                                                @if ($errors->has('district_id'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('district id', 'Quận/Huyện', $errors->first('district_id')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="postrow padbt10">
                                                        <div class="base1">
                                                            Phường/Xã<span id="lblWard" style="display: none;">(<span class="redfont">*</span>)</span>
                                                        </div>
                                                        <div class="base2">

                                                            <div id="divWard" class="comboboxs advance-select-box pad0">
                                                                <select class="advance-options select-ward" name="ward_id" id="select-ward" style="min-width: 220px;">
                                                                    <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Phường/Xã --
                                                                    </option>
                                                                </select>
                                                                @if ($errors->has('ward_id'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ward id', 'Phường/Xã', $errors->first('ward_id')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="base1">
                                                            Đường/Phố
                                                        </div>
                                                        <div class="base4">

                                                            <div id="divStreet" class="comboboxs advance-select-box pad0">
                                                                <select class="advance-options select-street" name="street_id" id="select-street" style="min-width: 220px;">
                                                                    <option value="0" class="advance-options" style="min-width: 168px;">-- Chọn Đường/Phố --
                                                                    </option>
                                                                </select>
                                                                @if ($errors->has('street_id'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ward id', 'Đường/Phố', $errors->first('street_id')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="postrow padbt10">
                                                        <div class="base1">
                                                            Tên dự án
                                                        </div>
                                                        <div class="base2">

                                                            <div id="divProject" class="comboboxs advance-select-box">
                                                                <input name="project" value="{{old('project') ?? $article->project ?? ''}}" type="text" id="project" class="text-field">
                                                                @if ($errors->has('project'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('project', 'dự án', $errors->first('project')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="base1">
                                                            Diện tích
                                                        </div>
                                                        <div class="base4">
                                                            <div style="float: left;">
                                                                <input name="area" type="number" step="any" value="{{old('area') ?? $article->area ?? ''}}" id="area" class="text-field" max="9999999" style="width: 110px;">
                                                                @if ($errors->has('area'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('area', 'diện tích', $errors->first('area')) }}</p></div>
                                                                @endif
                                                            </div>
                                                            <span>m²</span>
                                                        </div>
                                                    </div>
                                                    <div class="postrow padbt10">
                                                        <div class="base1">
                                                            Giá
                                                        </div>
                                                        <div class="base2">
                                                            <input name="price" style="width: 215px;" type="number" step="any" id="price" value="{{old('price') ?? $article->price ?? ''}}" class="text-field" numberonly="2" maxlength="6">
                                                            @if ($errors->has('price'))
                                                                <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('price', 'thành tiền', $errors->first('price')) }}</p></div>
                                                            @endif
                                                            <div style="color: #f00; display: inline-block;"></div>
                                                        </div>
                                                        <div class="base1">
                                                            Đơn vị
                                                        </div>
                                                        <div class="base4">
                                                            <div id="divStreet" class="comboboxs advance-select-box pad0">
                                                                <select id="ddlPriceType" name="ddlPriceType" class="advance-options select-ddlPriceType" style="min-width: 220px;border: 1px solid #CCC;">
                                                                    <option value="Thỏa thuận" class="advance-options" style="min-width: 168px;">Thỏa thuận</option>
                                                                </select>
                                                                @if ($errors->has('ddlPriceType'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ddlPriceType', 'đơn vị', $errors->first('ddlPriceType')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="postrow">
                                                        <div class="base1">
                                                            Tổng giá tiền
                                                        </div>
                                                        <div class="base2" id="_totalPrice" style="color: #f00;">
                                                        </div>
                                                    </div>
                                                    <div class="postrow">
                                                        <div class="base1">
                                                            Địa chỉ (<span class="redfont">*</span>)
                                                        </div>
                                                        <div class="base5">
                                                            <input name="address" value="{{old('address') ?? $article->address ?? ''}}" type="text" id="txtAddress" style="width: 93%;" class="text-field required" maxlength="200">
                                                            @if ($errors->has('address'))
                                                                <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('address', 'địa chỉ', $errors->first('address')) }}</p></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear">
                                                </div>
                                            </div>
                                            <div class="rowHeader">
                                                <h2>Thông tin mô tả</h2>
                                            </div>
                                            <div class="rowContent">
                                                <div class="postrow product-description">
                                                    <p>
                                                        (<span class="redfont">*</span>)<span class="grayfont">Tối đa chỉ 3000 ký tự</span>
                                                    </p>
                                                    <textarea name="content_article" id="content_article" style="height: 170px; width: 483px; max-width: 483px; float: left;" class="text-field countTypeLength required mt10" rows="50" cols="100" minlength="30" maxlength="3000">{{old('content_article') ?? $article->content_article ?? ''}}</textarea>

                                                    <div style="float: left; margin-top: 5px; padding-left: 5px; text-align: justify; width: 220px;">
                                                        <div class="text">
                                                            @if ($errors->has('content_article'))
                                                                <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('content article', 'mô tả', $errors->first('content_article')) }}</p></div>
                                                            @endif
                                                            <img src="/imgs/arrow.png" alt="">
                                                            Giới thiệu chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi: Gần công viên, gần trường học ... Tổng diện tích 52m2, đường đi ô tô vào tận cửa.
                                                            <span style="color: #f00;">Lưu ý: tin rao chỉ để mệnh giá tiền Việt Nam Đồng.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rowHeader">
                                                <h2>Thông tin khác</h2>
                                            </div>
                                            <div class="rowContent">
                                                <div style="padding: 10px 20px 0 30px;">
                                                    Quý vị nên điền đầy đủ thông tin vào các mục dưới đây để tin đăng có hiệu quả hơn
                                                </div>
                                                <div class="rowContentLeft">
                                                    <div class="postrow">
                                                        <div class="spMatTien">
                                                            <div class="base1">
                                                                Mặt tiền (m)
                                                            </div>
                                                            <div class="base2">
                                                                <input name="facade" type="text" value="{{old('facade') ?? $article->facade ?? ''}}" id="txtWidth" maxlength="6" numberonly="2" class="text-field ">
                                                                @if ($errors->has('facade'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('facade', 'mặt tiền', $errors->first('facade')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="spDuongVao">
                                                            <div class="base1">
                                                                Đường vào (m)
                                                            </div>
                                                            <div class="base4">
                                                                <input name="land_width" value="{{old('land_width') ?? $article->land_width ?? ''}}" type="text" id="txtLandWidth" maxlength="6" numberonly="2" onkeypress="return numbersonly(this, event, true);" class="text-field ">
                                                                @if ($errors->has('way_in'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('land width', 'đường vào', $errors->first('land_width')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="postrow">
                                                        <div class="base1">
                                                            Hướng nhà
                                                        </div>
                                                        <div class="base2">
                                                            <select id="ddlHomeDirection" name="ddl_home_direction" class="dropdown-list ">
                                                                <option value="KXĐ">KXĐ</option>
                                                                <option value="Đông">Đông</option>
                                                                <option value="Tây">Tây</option>
                                                                <option value="Nam">Nam</option>
                                                                <option value="Bắc">Bắc</option>
                                                                <option value="Đông-Bắc">Đông-Bắc</option>
                                                                <option value="Tây-Bắc">Tây-Bắc</option>
                                                                <option value="Tây-Nam">Tây-Nam</option>
                                                                <option value="Đông-Nam">Đông-Nam</option>
                                                            </select>
                                                            @if ($errors->has('ddlHomeDirection'))
                                                                <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ddlHomeDirection', 'hướng nhà', $errors->first('ddlHomeDirection')) }}</p></div>
                                                            @endif
                                                        </div>
                                                        <div class="spBanCong">
                                                            <div class="base1">
                                                                Hướng ban công
                                                            </div>
                                                            <div class="base4">
                                                                <select id="ddlBaconDirection" name="ddl_bacon_direction" class="dropdown-list ">
                                                                    <option value="KXĐ">KXĐ</option>
                                                                    <option value="Đông">Đông</option>
                                                                    <option value="Tây">Tây</option>
                                                                    <option value="Nam">Nam</option>
                                                                    <option value="Bắc">Bắc</option>
                                                                    <option value="Đông-Bắc">Đông-Bắc</option>
                                                                    <option value="Tây-Bắc">Tây-Bắc</option>
                                                                    <option value="Tây-Nam">Tây-Nam</option>
                                                                    <option value="Đông-Nam">Đông-Nam</option>
                                                                </select>
                                                                @if ($errors->has('ddlBaconDirection'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ddlBaconDirection', 'hướng ban công', $errors->first('ddlBaconDirection')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="postrow">
                                                        <div class="spSoTang">
                                                            <div class="base1">
                                                                Số tầng
                                                            </div>
                                                            <div class="base2">
                                                                <div style="width: 100%; float: left;">
                                                                    <input name="floor" type="text" id="txtFloorNumbers" value="{{old('floor') ?? $article->floor ?? ''}}" class="text-field " maxlength="3" numberonly="1">
                                                                    @if ($errors->has('floor'))
                                                                        <div class="errorMessage" style="display: block;">{{ str_replace('floor', 'số tầng', $errors->first('floor')) }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="postrow">
                                                        <div class="spSoPhongNgu">
                                                            <div class="base1">
                                                                Số phòng ngủ
                                                            </div>
                                                            <div class="base2">
                                                                <input name="bed_room" type="number" id="txtRoomNumber" style="width: 215px;" value="{{old('bed_room') ?? $article->bed_room ?? ''}}" class="text-field " maxlength="3" numberonly="1">
                                                                @if ($errors->has('bed_room'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('bed_room', 'số phòng ngủ', $errors->first('bed_room')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="spToilet">
                                                            <div class="base1">
                                                                Số toilet
                                                            </div>
                                                            <div class="base2">
                                                                <input name="toilet" type="number" style="width: 215px;" value="{{old('toilet') ?? $article->toilet ?? ''}}" id="txtToiletNumber" class="text-field " maxlength="3" numberonly="1">
                                                                @if ($errors->has('toilet'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('toilet', 'số toilet', $errors->first('toilet')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="postrow">
                                                        <div class="spNoiThat">
                                                            <div class="base1">
                                                                Nội thất
                                                            </div>
                                                            <div class="base5">
                                                                <div style="width: 100%; float: left;">
                                                                    <textarea name="furniture" id="txtInterior" rows="10" cols="50" class="text-field" style="width: 590px; height: 130px" maxlength="200">{{old('furniture') ?? $article->furniture ?? ''}}</textarea>
                                                                    @if ($errors->has('furniture'))
                                                                        <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('furniture', 'nội thất', $errors->first('furniture')) }}</p></div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear">
                                                </div>
                                            </div>
                                            <div class="rowHeader">
                                                <h2>Hình ảnh</h2>
                                            </div>
                                            <div class="rowContent">
                                                <div id="fileupload">
                                                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                                    <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                    <div class="row fileupload-buttonbar">
                                                        <div class="col-lg-10">
                                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                            <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>Thêm nhiều hình ảnh...</span>
                                                        <input type="file" name="files[]" multiple>
                                                    </span>
                                                            <div style="padding: 10px 20px 0 30px;display: contents;">
                                                                (hình ảnh đầu tiên sẽ được đặc làm ảnh đại điện cho tin của bạn)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- The table listing the files available for upload/download -->
                                                    <table role="presentation" class="table table-striped">
                                                        <tbody class="files">
                                                        @if(isset($article->gallery_image) && $article->gallery_image)
                                                            @foreach(json_decode($article->gallery_image) as $item)
                                                                <tr class="template-download fade in">
                                                                    <td>
                                                            <span class="preview">
                                                                    <a href="{{ Helpers::file_path($article->id, PUBLIC_ARTICLE_LEASE, true).$item}}"
                                                                       title="{{$item}}" download="{{$item}}" data-gallery=""><img width="120"
                                                                                                                                   src="{{ Helpers::file_path($article->id, PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.$item}}"></a>
                                                            </span>
                                                                    </td>
                                                                    <td>
                                                                        <p class="name">
                                                                            <a href="{{ Helpers::file_path($article->id, PUBLIC_ARTICLE_LEASE, true).$item}}"
                                                                               title="{{$item}}"
                                                                               download="{{$item}}" data-gallery="">{{$item}}</a>
                                                                        </p>
                                                                        <input hidden="" type="text" name="upload_images[]" value="{{$item}}">
                                                                    </td>
                                                                    <td>
                                                                        <button onclick="remove_exists_img('{{$item}}')" class="btn btn-danger delete">
                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                            <span>Delete</span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                        </tbody></table>
                                                </div>
                                            </div>
                                            <div class="rowHeader">
                                                <h2>Liên hệ</h2>
                                            </div>
                                            <div class="rowContent">
                                                <div class="rowContentLeft">
                                                    <div class="postrow">
                                                        <div class="base1">
                                                            Tên liên hệ
                                                        </div>
                                                        <div class="base5">
                                                            <input name="contact_name" type="text" required id="txtBrName" class="text-field" maxlength="200" style="width: 100%" value="{{old('contact_name')}}">
                                                            @if ($errors->has('contact_name'))
                                                                <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact name', 'tên liên hệ', $errors->first('contact_name'))}}</p></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="postrow">
                                                        <div class="base1">
                                                            Địa chỉ
                                                        </div>
                                                        <div class="base5">
                                                            <input name="contact_address" type="text" id="txtBrAddress" class="text-field" value="{{old('contact_address')}}" maxlength="200" style="width: 100%;">
                                                            @if ($errors->has('contact_address'))
                                                                <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact address', 'địa chỉ', $errors->first('contact_address'))}}</p></div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="postrow">
                                                        <div class="base1">
                                                            Di động( <span class="redfont">*</span> )
                                                        </div>
                                                        <div class="base5" style="position: relative;">
                                                            <div id="divBrMobile" class="advance-select-box" style="margin: 0px;height: 25px;position: relative;">
                                                                <input type="text" disabled name="contact_phone" class="select-text-content required contact_phone" value="{{old('contact_phone') ?? $_SESSION['verify_phone'] ?? ''}}" placeholder="" style="width: 175px;">
                                                                @if ($errors->has('contact_phone'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact phone', 'di động', $errors->first('contact_phone'))}}</p></div>
                                                                @endif
                                                                <button type="button" disabled style="width: auto; cursor: pointer;" id="MainContent__userPage_ctl00_lnkVerifyPrimaryNumber" class="button-blue" onclick="AddNumberPhone()" href="javascript:void(0)">{{old('contact_phone') ? 'Xác nhận số điện thoại khác' : isset($_SESSION['verify_phone']) ? 'Xác nhận số điện thoại khác' : 'Xác nhận số điện thoại đăng tin'}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="postrow">
                                                        <div>
                                                            <div class="base1">
                                                                Email:
                                                            </div>
                                                            <div class="base51">
                                                                <input name="contact_email" type="text" id="txtBrEmail" class="text-field email-field" maxlength="100" style="width: 100%;" email="1" value="{{old('contact_email')}}">
                                                                @if ($errors->has('contact_email'))
                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact email', 'email', $errors->first('contact_email')) }}</p></div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="clear">
                                                </div>
                                            </div>
                                            <div hidden class="rowHeader">
                                                <h2>Lịch đăng tin</h2>
                                            </div>
                                            <div hidden class="rowContent product-vipconfig">
                                                <div id="vipconfigregion">
                                                    <div id="vip_cofig_info" class="vip_cofig_info">
                                                        <ul id="row_0">
                                                            <li class="type">
                                                                <p>
                                                                    Loại tin rao
                                                                </p>
                                                                <p>
                                                                    <select id="ddlVipType" class="dropdown-list w80per mt5">
                                                                        <option value="Tin thường">Tin thường</option>
                                                                        <option value="Tin ưu đãi">Tin ưu đãi</option>
                                                                        <option value="Tin Vip 3">Tin Vip 3</option>
                                                                        <option value="Tin Vip 2">Tin Vip 2</option>
                                                                        <option value="Tin Vip 1">Tin Vip 1</option>
                                                                        <option value="Vip đặc biệt">Vip đặc biệt</option>
                                                                    </select>
                                                                </p>
                                                            </li>
                                                            <li class="begindate">
                                                                <p>
                                                                    Ngày bắt đầu
                                                                </p>
                                                                <p>
                                                                    <input name="start_news" type="text" id="txtStartDate" class="text-field w80per required mt5 hasDatepicker" value="{{date("d/m/Y")}}">
                                                                    <label class="errorMessage" style="display: none;">
                                                                    </label>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div id="vip_cofig_info_explain" style=""><strong>Tin thường</strong>: Là loại tin đăng bằng chữ <font color="#009AD2">màu xanh</font>, khung <font color="#009AD2">màu xanh</font></div>
                                                </div>
                                                <div class="product-vipnotice">
                                                    <img alt="vip icon" src="/imgs/vip-icon.jpg" style="padding-top: 3px;">
                                                    <div>
                                                        Quý khách nên chọn đăng tin Vip để có hiệu quả cao hơn, ví dụ: tin Vip1 có lượt  xem trung bình cao hơn <strong>20 lần</strong> so với tin thường
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="divCapCha1" class="rowPost">
                                                <table class="product-captcha" border="0">
                                                    <tbody><tr>
                                                        <td></td>
                                                        <td>
                                                            <div id="capcha_1"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="text-align: center">
                                                            Xác nhận mã an toàn trước khi đăng tin.
                                                            @if ($errors->has('g-recaptcha-response'))
                                                                <p style="color: red">{{ str_replace('g-recaptcha-response', 'mã an toàn', $errors->first('g-recaptcha-response'))}}</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                            <div id="finalError" style="color: #f00;"></div>

                                            <div id="MainContent__userPage_ctl00_divButton" class="rowPost" style="text-align: center; padding: 20px; width: 300px; margin: 0 auto;">
                                                <table style="border-collapse: collapse; width: 150px; margin: 0px auto;" border="0">
                                                    <tbody><tr>
                                                        <td>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="submit_type" class="submit_type" value="">
                                                            <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSave" value="Đăng tin" id="btnSave" class="bluebotton" style="width:80px;">
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>

                                            {{--<div id="divProDraftAction">--}}
                                            {{--<a href="javascript:void(0)" id="MainContent__userPage_ctl00_lnkSaveDraft" onclick="return deleteProductDraft();">(*) Tin đã được lưu vào tin nháp xóa nếu bạn không muốn lưu.</a><br>--}}

                                            {{--</div>--}}

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>

                </div>
            </div>
        </div>
@endsection
@section('footerElement')
    <div id="verifyPopupContainer" class="modal fade" role="dialog" style="top: 50px;">
        <div class="verifyPopup modal-dialog">
            <!-- Modal content-->
            <div class="verifyPopupClose fa fa-close" onclick="closePopup()"></div>
            <div class="modal-content">
                <div class="verifyPopupTitle">thêm số điện thoại đăng tin</div>
                <div class="verifyPopupContent">
                    <table>
                        <tbody>
                        <tr>
                            <td style="width:130px;">Số điện thoại đăng tin</td>
                            <td><input type="number" max="9999999999" min="0"
                                       placeholder="Nhập số điện thoại bạn muốn thêm vào hồ sơ " style="width:350px;"
                                       id="txtNumberPhone"></td>
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
                                <input placeholder="Nhập mã an toàn" type="text" id="captcha" value="" style=" height: 25px; border: 1px solid #ccc; padding: 0 10px; " />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="button" class="button-blue1" value="Lấy mã xác thực" onclick="SendVerifyOTP()"
                                       id="btnPopupSendOTP"> <span id="lblSMSPopupPrice">Miễn phí</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="lblPopupSendOTPMessage" style="display:none;">Mã xác thực đã được gửi đến số điện
                                    thoại <span id="lblMobile">xxxx xxx xxx</span> <br>Thời gian nhập mã xác thực còn lại:
                                    <span id="lblTimeout">05 phút</span></div>
                                <div id="lblPopupSendOTPError"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nhập mã xác thực</td>
                            <td><input type="number" min="0" max="999999" placeholder="Nhập mã số bạn nhận được qua SMS"
                                       style="width:240px; margin-right:20px;" id="txtOTP"><input type="button"
                                                                                                  class="button-blue1"
                                                                                                  value="Xác thực"
                                                                                                  onclick="VerifyOTPNumberPhone()">
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

@endsection
@section('contentJS')
    <script>
        function DirectDraft() {
            $('.submit_type').val('draf');
            $('#btnSave').click();
        }
        <?php
        if(old('province_id') ?? $article->province_id ?? false) {
        ?>
        $(document).ready(function() {
            document.getElementById('select-province').value = '<?php echo old('province_id') ?? $article->province_id ?? '' ?>';
            getDistrict('<?php echo old('province_id') ?? $article->province_id ?? '' ?>', '<?php echo old('district_id') ?? $article->district_id ?? '' ?>', '<?php echo old('ward_id') ?? $article->ward_id ?? '' ?>', '<?php echo old('street_id') ?? $article->street_id ?? '' ?>');
            <?php
            if(old('district_id') ?? $article->district_id ?? false) {
            ?>
            getWard(' <?php echo old('district_id') ?? $article->district_id ?? '' ?>', ' <?php echo old('ward_id') ?? $article->ward_id ?? '' ?>', '<?php echo old('street_id') ?? $article->street_id ?? '' ?>');
            <?php
            }
            ?>
        });
        <?php
        }
        ?>
        function typeMethod(val) {
            document.getElementById('type_article').options.length = 0;
            if(val == 'Nhà đất bán') {
                document.getElementById('type_article').options[0]=new Option("-- Phân mục --", "", false, false);
                document.getElementById('type_article').options[1]=new Option("Bán căn hộ chung cư", "Bán căn hộ chung cư", false, false);
                document.getElementById('type_article').options[2]=new Option("Bán nhà riêng", "Bán nhà riêng", false, false);
                document.getElementById('type_article').options[3]=new Option("Bán biệt thự, liền kề", "Bán biệt thự, liền kề", false, false);
                document.getElementById('type_article').options[4]=new Option("Bán nhà mặt phố", "Bán nhà mặt phố", false, false);
                document.getElementById('type_article').options[5]=new Option("Bán đất nền dự án", "Bán đất nền dự án", false, false);
                document.getElementById('type_article').options[6]=new Option("Bán đất", "Bán đất", false, false);
                document.getElementById('type_article').options[7]=new Option("Bán trang trại, khu nghỉ dưỡng", "Bán trang trại, khu nghỉ dưỡng", false, false);
                document.getElementById('type_article').options[8]=new Option("Bán kho, nhà xưởng", "Bán kho, nhà xưởng", false, false);
                document.getElementById('type_article').options[9]=new Option("Bán loại bất động sản khác", "Bán loại bất động sản khác", false, false);

                document.getElementById('ddlPriceType').options[0]=new Option("Thỏa thuận", "Thỏa thuận", false, false);
                document.getElementById('ddlPriceType').options[1]=new Option("Triệu", "Triệu", false, false);
                document.getElementById('ddlPriceType').options[2]=new Option("Tỷ", "Tỷ", false, false);
                document.getElementById('ddlPriceType').options[3]=new Option("Trăm nghìn/m2", "Trăm nghìn/m2", false, false);
                document.getElementById('ddlPriceType').options[4]=new Option("Triệu/m2", "Triệu/m2", false, false);

            }else{
                document.getElementById('type_article').options[0]=new Option("-- Phân mục --", "", false, false);
                document.getElementById('type_article').options[1]=new Option("Cho thuê căn hộ chung cư", "Cho thuê căn hộ chung cư", false, false);
                document.getElementById('type_article').options[2]=new Option("Cho thuê căn nhà riêng", "Cho thuê căn nhà riêng", false, false);
                document.getElementById('type_article').options[3]=new Option("Cho thuê nhà mặt phố", "Cho thuê nhà mặt phố", false, false);
                document.getElementById('type_article').options[4]=new Option("Cho thuê nhà trọ, phòng trọ", "Cho thuê nhà trọ, phòng trọ", false, false);
                document.getElementById('type_article').options[5]=new Option("Cho thuê văn phòng", "Cho thuê văn phòng", false, false);
                document.getElementById('type_article').options[6]=new Option("Cho thuê cửa hàng, ki ốt", "Cho thuê cửa hàng, ki ốt", false, false);
                document.getElementById('type_article').options[7]=new Option("Cho thuê kho, nhà xưởng, đất", "Cho thuê kho, nhà xưởng, đất", false, false);
                document.getElementById('type_article').options[8]=new Option("Cho thuê loại bất động sản khác", "Cho thuê loại bất động sản khác", false, false);

                document.getElementById('ddlPriceType').options[0]=new Option("Thỏa thuận", "Thỏa thuận", false, false);
                document.getElementById('ddlPriceType').options[1]=new Option("Nghìn/tháng", "Nghìn/tháng", false, false);
                document.getElementById('ddlPriceType').options[2]=new Option("Triệu/tháng", "Triệu/tháng", false, false);
                document.getElementById('ddlPriceType').options[3]=new Option("Nghìn/m2/tháng", "Nghìn/m2/tháng", false, false);
                document.getElementById('ddlPriceType').options[4]=new Option("Triệu/m2/tháng", "Triệu/m2/tháng", false, false);
                document.getElementById('ddlPriceType').options[5]=new Option("Nghìn/m2/tháng", "Nghìn/m2/tháng", false, false);
            }
            enableSmsOtp();
        }
        $('#txtTitle').keyup(function() {
            $('.txtProductTitle_count').html(99 - this.value.length);
        });
        $('#content_article').keyup(function() {
            $('.grayfont').html('Tối đa chỉ ' + (3000 - this.value.length) + ' ký tự');
        });
        <?php

            if(old('ddlHomeDirection') ?? $article->ddlHomeDirection ?? false){
                ?>
                document.getElementById('ddlHomeDirection').value = '<?php echo old('ddlHomeDirection') ?? $article->ddlHomeDirection ?? '' ?>';
                <?php
            }
            if(old('ddlBaconDirection') ?? $article->ddlBaconDirection ?? false){
                ?>
                document.getElementById('ddlBaconDirection').value = '<?php echo old('ddlBaconDirection') ?? $article->ddlBaconDirection ?? '' ?>';
                <?php
            }
            if(old('method_article') ?? $article->method_article ?? false) {
                echo old('method_article') ? "document.getElementById('method_article').value = '".old('method_article')."'; typeMethod('".old('method_article')."');" : '';
                echo isset($article->method_article) ? "document.getElementById('method_article').value = '".$article->method_article."'; typeMethod('".$article->method_article."');" : '';
                ?>
                document.getElementById('type_article').value = '<?php echo old('type_article') ?? $article->type_article ?? '' ?>';
                <?php
            }
            if(old('ddlPriceType') ?? $article->ddlPriceType ?? false){
                ?>
                document.getElementById('ddlPriceType').value = '<?php echo old('ddlPriceType') ?? $article->ddlPriceType ?? '' ?>';
                <?php
            }
        ?>
        $('#price').keyup(function() {
            let valPrice = this.value;
            if(valPrice && $('#ddlPriceType').val() != 'Thỏa thuận'){
                $('#_totalPrice').html(valPrice + ' ' + $('#ddlPriceType').val());
            }else{
                $('#_totalPrice').html('Thỏa thuận');
            }
        });
        $('#ddlPriceType').change(function() {
            reloadTotalPrice();
        })
        function reloadTotalPrice() {
            let valPrice = $('#price').val();
            if(valPrice && $('#ddlPriceType').val() != 'Thỏa thuận'){
                $('#_totalPrice').html(valPrice + ' ' + $('#ddlPriceType').val());
            }else{
                $('#_totalPrice').html('Thỏa thuận');
            }
        }
        <?php
        if(old('price') ?? $article->price ?? false) {
            ?>
                reloadTotalPrice();
            <?php
        }elseif(old('ddlPriceType') ?? $article->ddlPriceType ?? false) {
            ?>
                reloadTotalPrice();
            <?php
        }
        ?>
        function remove_exists_img(img) {
            let old = $('#remove_imgs').val();
            $('#remove_imgs').val((old ? (old + '|') : '') + img);
        }
        $('.select-province').change(function() {
            $('#txtAddress').val($('.select-province option:selected').text());
        });
        $('.select-district').change(function() {
            $('#txtAddress').val($('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
        $('.select-ward').change(function() {
            var ward = $('.select-ward option:selected').val() ? 'Phường ' + $('.select-ward option:selected').text() + ', ' : '';
            var street = $('.select-street option:selected').val() ?  ('Đường ' + $('.select-street option:selected').text() + ', ') : '';
            $('#txtAddress').val(street + ward + $('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
        $('.select-street').change(function() {
            var ward = $('.select-ward option:selected').val() ? 'Phường ' + $('.select-ward option:selected').text() + ', ' : '';
            var street = $('.select-street option:selected').val() ?  ('Đường ' + $('.select-street option:selected').text() + ', ') : '';
            $('#txtAddress').val(street + ward + $('.select-district option:selected').text() + ', ' + $('.select-province option:selected').text());
        });
        $('#ddlPriceType').change(function() {
            $('#price_type').html($('#ddlPriceType').val());
        })

    </script>
    <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                        <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } else { %}
                    <input hidden type="text" name="upload_images[]" value="{%=file.name%}" />
                {% } %}
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                    {{--<input type="checkbox" name="delete" value="1" class="toggle">--}}
                {% } else { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="/js/upload/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}
    <!-- blueimp Gallery script -->
    <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="/js/upload/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="/js/upload/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="/js/upload/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="/js/upload/jquery.fileupload-image.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="/js/upload/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="/js/upload/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <script src="/js/upload/main.js"></script>
    <script>
        function AddNumberPhone() {
            $("#verifyPopupContainer").modal();
            // $("#myModal").modal();
        }
        var widgetId1;
        var widgetId2;
        var onloadCallback = function() {
            // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
            // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
            widgetId1 = grecaptcha.render('capcha_1', {
                'sitekey': '<?php echo env('NOCAPTCHA_SECRET') ?>',
            });

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
                    type: 'update_news',
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
                        $('.contact_phone').val(response.data.phone);
                        alertModal(response.message);
                    }else{
                        $('#lblPopupOTPError').html(response.message);
                    }
                }
            });
        }

        function enableSmsOtp() {
            if($('#txtTitle').val() && $('#method_article').val() && $('#type_article').val() && $('.select-province').val() != 0 && $('.select-district').val() != 0) {
                $('#MainContent__userPage_ctl00_lnkVerifyPrimaryNumber').attr('disabled', false);
            }else{
                $('#MainContent__userPage_ctl00_lnkVerifyPrimaryNumber').attr('disabled', true);
            }
            return false;
        }
    </script>
@endsection