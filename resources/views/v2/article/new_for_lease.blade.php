<?php
use App\Library\Helpers;
$mySelf = Auth::user();
global $province;
?>
@include('cache.province')
@section('contentCSS')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
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
                            <div class="col-md-3 col-sm-3" style="display: inline-flex; padding-left: 0px;">
                                @include('v2.user.left_sidebar_avatar', ['mySelf' => $mySelf])
                            </div>
                            <div class="col-md-9 col-sm-9" style="display: inline-flex; padding-right: 0px">
                                <div class="property-content" style="margin: 25px 0 30px; width: 100%;">
                                    @if(Auth::user()->phone)
                                        <div id="column-no-right-user">
                                            <form action="/quan-ly-tin/dang-tin-ban-cho-thue" enctype="multipart/form-data" class="form_submit" method="POST">
                                                <div class="post-product">
                                                    <div id="user_manage_product" style="border: none;">
                                                        <div id="divPostNews">
                                                            <div class="post-bg-Title mgt10">
                                                                @if(isset($article->id))
                                                                    <h1>Chỉnh sửa tin rao bán, cho thuê nhà đất</h1>
                                                                @else
                                                                    <h1>Đăng tin rao bán, cho thuê nhà đất</h1>
                                                                @endif
                                                                <div style="margin-top: -10px;">(Quý vị nhập thông tin nhà đất cần bán hoặc cho thuê vào các mục dưới đây)</div>
                                                            </div>
                                                            <div class="rowHeader title_sidebar_top_left">
                                                                THÔNG TIN CƠ BẢN
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
                                                            <div class="rowContent">
                                                                <div class="rowContentLeft">
                                                                    <div class="rowPost">
                                                                        @if ($errors->has('g-recaptcha-response'))
                                                                            <p style="color: red; padding-left: 42px; font-weight: 700">{{ str_replace('g-recaptcha-response', 'mã an toàn', $errors->first('g-recaptcha-response'))}}</p>
                                                                        @endif
                                                                        <div class="leftArea leftPostArea">
                                                                            <div id="labeltitle">
                                                                                <label>
                                                                                    Tiêu đề(<span class="redfont">*</span>):</label>
                                                                            </div>
                                                                            <div class="input">
                                                                                <input name="title" placeholder="Vui lòng nhập tiêu đề tin đăng của bạn. Tối thiểu là 30 ký tự và tối đa là 99 ký tự." value="{{old('title') ?? $article->title ?? ''}}" type="text" id="txtTitle" class="text-field has-help required countTypeLength form-control" maxlength="99" minlength="30">
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
                                                                                <select id="method_article" name="method_article" class="advance-options form-control" style="min-width: 220px;border: 1px solid #CCC;"  onchange="typeMethod(this.value);">
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
                                                                                <select id="type_article" name="type_article" class="advance-options form-control" style="min-width: 220px;border: 1px solid #CCC;">
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
                                                                                <select id="select-province" name="province_id" class="advance-options select-province form-control" style="min-width: 220px;border: 1px solid #CCC;">
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
                                                                                <select name="district_id" class="advance-options select-district form-control" style="min-width: 220px;border: 1px solid #CCC;">
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
                                                                                <select class="advance-options select-ward form-control" name="ward_id" id="select-ward" style="min-width: 220px;">
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
                                                                                <select class="advance-options select-street form-control" name="street_id" id="select-street" style="min-width: 220px;">
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
                                                                                <input name="project" value="{{old('project') ?? $article->project ?? ''}}" type="text" id="project" class="text-field form-control">
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
                                                                                <input name="area" type="number" step="any" value="{{old('area') ?? $article->area ?? ''}}" id="area" class="text-field form-control" max="9999999" style="width: 110px;">
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
                                                                            <input name="price" style="width: 220px;" type="number" step="any" id="price" value="{{old('price') ?? $article->price ?? ''}}" class="text-field form-control" numberonly="2" maxlength="6">
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
                                                                                <select id="ddlPriceType" name="ddlPriceType" class="advance-options select-ddlPriceType form-control" style="min-width: 220px;border: 1px solid #CCC;">
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
                                                                        <div class="base2" id="_totalPrice" style="color: #f00; margin-top: 10px">
                                                                        </div>
                                                                    </div>
                                                                    <div class="postrow">
                                                                        <div class="base1">
                                                                            Địa chỉ (<span class="redfont">*</span>)
                                                                        </div>
                                                                        <div class="base5">
                                                                            <input name="address" value="{{old('address') ?? $article->address ?? ''}}" type="text" id="txtAddress" style="width: 91%;" class="form-control text-field required" maxlength="200">
                                                                            @if ($errors->has('address'))
                                                                                <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('address', 'địa chỉ', $errors->first('address')) }}</p></div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="clear">
                                                                </div>
                                                            </div>
                                                            <div class="rowHeader title_sidebar_top_left">
                                                                THÔNG TIN MÔ TẢ
                                                            </div>
                                                            <div class="rowContent">
                                                                <div class="postrow product-description">
                                                                    <p>
                                                                        (<span class="redfont">*</span>)<span class="grayfont">Tối đa chỉ 3000 ký tự</span>
                                                                    </p>
                                                                    <textarea name="content_article" id="content_article" style="height: 170px; width: 483px; max-width: 483px; float: left;" class="text-field countTypeLength required mt10" rows="50" cols="100" minlength="30" maxlength="3000">{{old('content_article') ?? $article->content_article ?? ''}}</textarea>
                                                                    <script> CKEDITOR.replace( 'content_article' );</script>
                                                                    <div style="float: left; margin-top: 5px; padding-left: 5px; text-align: justify;">
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
                                                            <div class="rowHeader title_sidebar_top_left">
                                                                THÔNG TIN KHÁC
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
                                                                                <input name="facade" type="text" value="{{old('facade') ?? $article->facade ?? ''}}" id="txtWidth" maxlength="6" numberonly="2" class="text-field form-control">
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
                                                                                <input name="land_width" value="{{old('land_width') ?? $article->land_width ?? ''}}" type="text" id="txtLandWidth" maxlength="6" numberonly="2" onkeypress="return numbersonly(this, event, true);" class="text-field form-control">
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
                                                                            <select id="ddl_home_direction" name="ddl_home_direction" class="dropdown-list form-control">
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
                                                                            @if ($errors->has('ddl_home_direction'))
                                                                                <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ddl_home_direction', 'hướng nhà', $errors->first('ddl_home_direction')) }}</p></div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="spBanCong">
                                                                            <div class="base1">
                                                                                Hướng ban công
                                                                            </div>
                                                                            <div class="base4">
                                                                                <select id="ddl_bacon_direction" name="ddl_bacon_direction" class="dropdown-list form-control">
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
                                                                                @if ($errors->has('ddl_bacon_direction'))
                                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ddl_bacon_direction', 'hướng ban công', $errors->first('ddl_bacon_direction')) }}</p></div>
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
                                                                                    <input name="floor" type="text" id="txtFloorNumbers" value="{{old('floor') ?? $article->floor ?? ''}}" class="text-field form-control" maxlength="3" numberonly="1">
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
                                                                                <input name="bed_room" type="number" id="txtRoomNumber" style="width: 220px;" value="{{old('bed_room') ?? $article->bed_room ?? ''}}" class="text-field form-control" maxlength="3" numberonly="1">
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
                                                                                <input name="toilet" type="number" style="width: 220px;" value="{{old('toilet') ?? $article->toilet ?? ''}}" id="txtToiletNumber" class="text-field form-control" maxlength="3" numberonly="1">
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
                                                                                    <textarea name="furniture" id="txtInterior" rows="10" cols="50" class="text-field form-control" style="width: 600px; height: 130px" maxlength="200">{{old('furniture') ?? $article->furniture ?? ''}}</textarea>
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
                                                            <div class="rowHeader title_sidebar_top_left">
                                                                HÌNH ẢNH
                                                            </div>
                                                            <div class="rowContent">
                                                                <div id="fileupload">
                                                                @if(old('html_img'))
                                                                    <?php echo old('html_img'); ?>
                                                                @else
                                                                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                                                        <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                                                                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                                        <div class="row fileupload-buttonbar">
                                                                            <div class="col-lg-10">
                                                                                <!-- The fileinput-button span is used to style the file input field as button -->
                                                                                <span class="btn btn-success fileinput-button" style="font-size: 12px">
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
                                                                        <table style="width: 100%; margin-top: 20px; border: none;" class="t-4-c table-search-article">
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
                                                                            </tbody>
                                                                        </table>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="rowHeader title_sidebar_top_left">
                                                                LIÊN HỆ
                                                            </div>
                                                            <div class="rowContent">
                                                                <div class="rowContentLeft">
                                                                    <div class="postrow">
                                                                        <div class="base1">
                                                                            Tên liên hệ
                                                                        </div>
                                                                        <div class="base5">
                                                                            <input name="contact_name" type="text" required id="txtBrName" class="text-field form-control" maxlength="200" style="width: 100%" value="{{old('contact_name') ?? $article->contact_name ?? $mySelf->name}}">
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
                                                                            <input name="contact_address" type="text" id="txtBrAddress" class="text-field form-control" value="{{old('contact_address') ?? $article->contact_address ?? (($mySelf->address ? $mySelf->address.', ' : '').($mySelf->street ? $mySelf->street.', ' : '').($mySelf->ward ? $mySelf->ward.', ' : '').($mySelf->district ? $mySelf->district.', ' : '').($mySelf->province ? $mySelf->province.', Việt Nam' : ''))}}" maxlength="200" style="width: 100%;">
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
                                                                            <div id="divBrMobile" class="comboboxs advance-select-box" style="margin: 0px;height: 25px;position: relative;">
                                                                                <input type="text" {{backpack_user()->hasRole('admin') ? '' : 'disabled'}} name="contact_phone" class="select-text-content required form-control" value="{{old('contact_phone') ?? $article->contact_phone ?? $mySelf->phone}}" placeholder="" style="width: 175px;">
                                                                                @if ($errors->has('contact_phone'))
                                                                                    <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact phone', 'di động', $errors->first('contact_phone'))}}</p></div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="postrow">
                                                                        <div>
                                                                            <div class="base1">
                                                                                Email:
                                                                            </div>
                                                                            <div class="base51">
                                                                                <input name="contact_email" type="text" id="txtBrEmail" class="text-field email-field form-control" maxlength="100" email="1" value="{{old('contact_email') ?? $article->contact_email ?? $mySelf->email}}">
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
                                                            <div class="rowContent product-vipconfig hidden">
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
                                                                <table style="width: 100%; margin-top: 20px; border: none;" class="t-4-c table-search-article">
                                                                    <tbody><tr>
                                                                        <td>
                                                                            <div class="g-recaptcha" data-sitekey="{{env('NOCAPTCHA_SECRET')}}"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" style="text-align: center">
                                                                            Xác nhận mã an toàn trước khi đăng tin.
                                                                            @if ($errors->has('g-recaptcha-response'))
                                                                                <p style="color: red; font-weight: 700">{{ str_replace('g-recaptcha-response', 'mã an toàn', $errors->first('g-recaptcha-response'))}}</p>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    </tbody></table>
                                                            </div>
                                                            <div id="finalError" style="color: #f00;"></div>
                                                            <div id="MainContent__userPage_ctl00_divButton" class="rowPost" style="text-align: center; padding: 20px; width: 300px; margin: 0 auto;">
                                                                <table style="width: 100%; border: none;" class="t-4-c table-search-article">
                                                                    <tbody><tr>
                                                                        <td>
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <input type="hidden" name="submit_type" class="submit_type" value="">
                                                                            @if(isset($article->id))
                                                                                <input type="hidden" name="id" value="{{ $article->id }}">
                                                                                <input type="hidden" name="remove_imgs" id="remove_imgs" value="">
                                                                                @if($article->status == PUBLISHED_ARTICLE)
                                                                                    <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSave" value="Lưu tin" id="btnSave" class="bluebotton" style="width:80px;">
                                                                                @else
                                                                                    <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSave" value="Đăng tin" id="btnSave" class="bluebotton" style="width:80px;">
                                                                                @endif
                                                                            @else
                                                                                <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSave" value="Đăng tin" id="btnSave" class="bluebotton" style="width:80px;">
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <input id="btnCancel" type="button" value="Lưu Nháp" name="btnCancel" class="orangebutton" onclick="DirectDraft()">
                                                                        </td>
                                                                        <input type="hidden" name="html_img" id="html_img" value="">
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
                                    @else
                                        <div id="column-no-right-user" style="width: 75%; float: left">
                                            <div class="post-product">
                                                <div id="user_manage_product" style="border: none;">
                                                    <div class="post-message">
                                                        <div class="post-message-result">
                                                            <div style="background-color: orangered;"><span
                                                                        class="fa fa-warning fa-3x"></span></div>
                                                            <span style="color: orange;">Bạn cần cung cấp số điện thoại</span>
                                                        </div>
                                                        <div class="post-message-result-detail">
                                                <span>Tài khoản của bạn chưa có thông tin về số điện thoại. Bạn cần cập nhật số điện thoại trước khi bắt đầu sử dụng chức năng này. Bạn hãy cập nhật số điện thoại trong chức năng <a
                                                            href="/thong-tin-ca-nhan/thay-doi-ca-nhan">Thay đổi thông tin cá nhân</a></span>
                                                        </div>
                                                        <div class="post-message-hotline">
                                                            <span>Mọi thắc mắc xin vui lòng liên hệ tổng đài CSKH:</span><br>
                                                            <span class="fa fa-phone-square fa-2x" style="float: left;"></span>
                                                            <span class="fone"
                                                                  style="display: inline-block; font-size: 16px; color: #339900; height: 25px;">{{ENV('PHONE_CONTACT')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear">
                                            </div>
                                        </div>
                                    @endif
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
        $('#btnSave').click(function() {
            $('#html_img').val($('#fileupload').html());
        })
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
                document.getElementById('type_article').options[0]=new Option("--Phân mục--", "", false, false);
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
                document.getElementById('type_article').options[0]=new Option("--Phân mục--", "", false, false);
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
                document.getElementById('ddlPriceType').options[4]=new Option("Triệu/m2/tháng", "Triệu/m2/tháng", false, false);
                document.getElementById('ddlPriceType').options[5]=new Option("Nghìn/m2/tháng", "Nghìn/m2/tháng", false, false);
            }
        }
        $('#txtTitle').keyup(function() {
            $('.txtProductTitle_count').html(99 - this.value.length);
        });
        $('#content_article').keyup(function() {
            $('.grayfont').html('Tối đa chỉ ' + (3000 - this.value.length) + ' ký tự');
        });
        <?php

        if(old('ddl_home_direction') ?? $article->ddl_home_direction ?? false){
        ?>
        document.getElementById('ddl_home_direction').value = '<?php echo old('ddl_home_direction') ?? $article->ddl_home_direction ?? '' ?>';
        <?php
        }
        if(old('ddl_bacon_direction') ?? $article->ddl_bacon_direction ?? false){
        ?>
        document.getElementById('ddl_bacon_direction').value = '<?php echo old('ddl_bacon_direction') ?? $article->ddl_bacon_direction ?? '' ?>';
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
        $('#user_manage_product .select-province').change(function() {
            $('#txtAddress').val($('#user_manage_product .select-province option:selected').text());
        });
        $('#user_manage_product .select-district').change(function() {
            $('#txtAddress').val($('#user_manage_product .select-district option:selected').text() + ', ' + $('#user_manage_product .select-province option:selected').text());
        });
        $('#user_manage_product .select-ward').change(function() {
            var ward = $('#user_manage_product .select-ward option:selected').val() ? 'Phường ' + $('#user_manage_product .select-ward option:selected').text() + ', ' : '';
            var street = $('#user_manage_product .select-street option:selected').val() ?  ('Đường ' + $('#user_manage_product .select-street option:selected').text() + ', ') : '';
            $('#txtAddress').val(street + ward + $('#user_manage_product .select-district option:selected').text() + ', ' + $('#user_manage_product .select-province option:selected').text());
        });
        $('#user_manage_product .select-street').change(function() {
            var ward = $('#user_manage_product .select-ward option:selected').val() ? 'Phường ' + $('#user_manage_product .select-ward option:selected').text() + ', ' : '';
            var street = $('#user_manage_product .select-street option:selected').val() ?  ('Đường ' + $('#user_manage_product .select-street option:selected').text() + ', ') : '';
            $('#txtAddress').val(street + ward + $('#user_manage_product .select-district option:selected').text() + ', ' + $('#user_manage_product .select-province option:selected').text());
        });
        $('#method_article').change(function() {
            resetAddress();
        });
        $('#type_article').change(function() {
            resetAddress();
        });
        function resetAddress() {
            $('#user_manage_product .select-province').prop("selectedIndex", 0);
            $('#user_manage_product .select-district').html('<option value="">--Chọn Quận/Huyện--</option>');
            $('#user_manage_product .select-ward').html('<option value="">--Chọn Phường/Xã--</option>');
            $('#user_manage_product .select-street').html('<option value="">--Chọn Đường/Phố--</option>');
            $('#txtAddress').val('');
        }
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
@endsection