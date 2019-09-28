<?php
use App\Library\Helpers;
$mySelf = Auth::user();
global $province;
?>
@include('cache.province')
@section('contentCSS')
    <link rel="stylesheet" type="text/css" href="/css/dang-tin.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
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
        .orangebutton {
            background-image: url(/imgs/bg-ogrange-button.png);
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
                                @include('user.left_sidebar_avatar', ['mySelf' => $mySelf])
                            </div>
                        </div>

                        <div class="clear">
                        </div>
                    </div>
                    @if(Auth::user()->phone)
                    <div id="column-no-right-user" style="width: 75%; float: left">
                        <form action="/quan-ly-tin/dang-tin-can-mua-can-thue" enctype="multipart/form-data" method="POST">
                        <div class="post-product">
                            <div id="user_manage_product" style="border: none;">
                                <div id="divPostNews">
                                    <div class="post-bg-Title mgt10">
                                        @if(isset($article->id))
                                            <h1>CHỈNH SỬA TIN RAO CẦN MUA, CẦN THUÊ NHÀ ĐẤT</h1>
                                        @else
                                            <h1>ĐĂNG TIN RAO CẦN MUA, CẦN THUÊ NHÀ ĐẤT</h1>
                                        @endif
                                        <div>
                                            (Quý vị nhập thông tin nhà đất cần mua hoặc cần thuê vào các mục dưới đây)
                                        </div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <p style="color: red">{{ str_replace('g-recaptcha-response', 'mã an toàn', $errors->first('g-recaptcha-response'))}}</p>
                                        @endif
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
                                                        <input name="title" placeholder="Vui lòng nhập tiêu đề tin đăng của bạn. Tối thiểu là 30 ký tự và tối đa là 99 ký tự." value="{{old('title') ?? $article->title ?? ''}}" type="text" id="txtTitle" class="text-field has-help required countTypeLength" maxlength="99" minlength="30">
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
                                                            <option value="Nhà đất cần mua" class="advance-options" style="min-width: 195px;">Nhà đất cần mua</option>
                                                            <option value="Nhà đất cần thuê" class="advance-options" style="min-width: 195px;">Nhà đất cần thuê</option>
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
                                                        <select id="type_article" name="type_article" class="advance-options" style="min-width: 220px;border: 1px solid #CCC;">
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
                                                        <select id="select-province" name="province_id" class="advance-options select-province" style="min-width: 220px;border: 1px solid #CCC;">
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
                                                        <select name="district_id" class="advance-options select-district" style="min-width: 220px;border: 1px solid #CCC;">
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
                                                        <input name="area_from" type="number" min="1" step="any" value="{{old('area_from') ?? $article->area_from ?? ''}}" placeholder=" từ" id="area_from" class="text-field" numberonly="2" maxlength="7" style="width: 60px;">
                                                         -
                                                        <input name="area_to" type="number" min="1" step="any" value="{{old('area_to') ?? $article->area_to ?? ''}}" placeholder=" đến" id="area_to" class="text-field" numberonly="2" maxlength="7" style="width: 60px;">
                                                    </div>
                                                    <span>m²</span>
                                                </div>
                                            </div>
                                            <div class="postrow padbt10">
                                                <div class="base1">
                                                    Chọn mức giá
                                                </div>
                                                <div class="base4">
                                                    <div style="float: left;">
                                                        <input name="price_from" type="number" min="1" step="any" placeholder=" từ" id="price_from" style="width: 60px;" value="{{old('price_from') ?? $article->price_from ?? ''}}" class="text-field" numberonly="2" maxlength="6">
                                                        -
                                                        <input name="price_to" type="number" min="1" step="any" placeholder=" đến" id="price_to" style="width: 60px;" value="{{old('price_to') ?? $article->price_to ?? ''}}" class="text-field" numberonly="2" maxlength="6">
                                                        @if ($errors->has('price'))
                                                            <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('price', 'thành tiền', $errors->first('price')) }}</p></div>
                                                        @endif
                                                        <span id="price_type">triệu/tháng</span>
                                                    </div>
                                                </div>
                                                <div class="base1">
                                                    Đơn vị
                                                </div>
                                                <div class="base4">
                                                    <div id="divStreet" class="comboboxs advance-select-box pad0">
                                                        <select id="ddlPriceType" name="ddlPriceType" class="advance-options select-ddlPriceType" style="min-width: 220px;border: 1px solid #CCC;">
                                                            <option value="Triệu/tháng" class="advance-options" style="min-width: 168px;">Triệu/tháng</option>
                                                            <option value="Triệu" class="advance-options" style="min-width: 168px;">Triệu</option>
                                                        </select>
                                                        @if ($errors->has('ddlPriceType'))
                                                            <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('ddlPriceType', 'đơn vị', $errors->first('ddlPriceType')) }}</p></div>
                                                        @endif
                                                    </div>
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
                                            <table role="presentation" class="table table-striped"><tbody class="files">
                                                @if(isset($article->gallery_image) && $article->gallery_image)
                                                    @foreach(json_decode($article->gallery_image) as $item)
                                                        <tr class="template-download fade in">
                                                            <td>
                                                            <span class="preview">
                                                                    <a href="{{ Helpers::file_path($article->id, PUBLIC_ARTICLE_BUY, true).$item}}"
                                                                       title="{{$item}}" download="{{$item}}" data-gallery=""><img width="120"
                                                                                src="{{ Helpers::file_path($article->id, PUBLIC_ARTICLE_BUY, true).THUMBNAIL_PATH.$item}}"></a>
                                                            </span>
                                                            </td>
                                                            <td>
                                                                <p class="name">
                                                                    <a href="{{ Helpers::file_path($article->id, PUBLIC_ARTICLE_BUY, true).$item}}"
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
                                                    <input name="contact_name" type="text" required id="txtBrName" class="text-field" maxlength="200" style="width: 100%" value="{{old('contact_name') ?? $article->contact_name ?? $mySelf->name}}">
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
                                                    <input name="contact_address" type="text" id="txtBrAddress" class="text-field" value="{{old('contact_address') ?? $article->contact_address ?? (($mySelf->address ? $mySelf->address.', ' : '').($mySelf->street ? $mySelf->street.', ' : '').($mySelf->ward ? $mySelf->ward.', ' : '').($mySelf->district ? $mySelf->district.', ' : '').($mySelf->province ? $mySelf->province.', Việt Nam' : ''))}}" maxlength="200" style="width: 100%;">
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
                                                        <input type="text" name="contact_phone" {{backpack_user()->hasRole('admin') ? '' : 'disabled'}} class="select-text-content required" value="{{old('contact_phone') ?? $article->contact_phone ?? $mySelf->phone}}" placeholder="" style="width: 175px;">
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
                                                        <input name="contact_email" type="text" id="txtBrEmail" class="text-field email-field" maxlength="100" style="width: 100%;" email="1" value="{{old('contact_email') ?? $article->contact_email ?? $mySelf->email}}">
                                                        @if ($errors->has('contact_email'))
                                                            <div class="errorMessage" style="display: block;"><p style="color: red">{{ str_replace('contact email', 'email', $errors->first('contact_email')) }}</p></div>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="rowContentRight" id="helpMessageContactName" style="display: none;">
                                            <div class="image">
                                                <img src="https://file4.batdongsan.com.vn/images/Home/images/arrow.png" alt="">
                                            </div>
                                            <div class="text">
                                                Vui lòng nhập tên để người đọc tin có thể liên lạc với bạn.
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
                                                    <div class="g-recaptcha" data-sitekey="{{env('NOCAPTCHA_SECRET')}}"></div>
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
            if(val == 'Nhà đất cần mua') {
                document.getElementById('type_article').options[0]=new Option("-- Phân mục --", "", false, false);
                document.getElementById('type_article').options[1]=new Option("Cần mua căn hộ chung cư", "Mua căn hộ chung cư", false, false);
                document.getElementById('type_article').options[2]=new Option("Cần mua nhà riêng", "Mua nhà riêng", false, false);
                document.getElementById('type_article').options[3]=new Option("Cần mua nhà biệt thự, liền kề", "Mua nhà biệt thự, liền kề", false, false);
                document.getElementById('type_article').options[4]=new Option("Cần mua nhà mặt phố", "Mua nhà mặt phố", false, false);
                document.getElementById('type_article').options[5]=new Option("Cần mua đất nền dự án", "Mua đất nền dự án", false, false);
                document.getElementById('type_article').options[6]=new Option("Cần mua đất", "Mua đất", false, false);
                document.getElementById('type_article').options[7]=new Option("Cần mua trang trại, khu nghỉ dưỡng", "Mua trang trại, khu nghỉ dưỡng", false, false);
                document.getElementById('type_article').options[8]=new Option("Cần mua kho, nhà xưởng", "Mua kho, nhà xưởng", false, false);
                document.getElementById('type_article').options[9]=new Option("Cần mua loại bất động sản khác", "Mua loại bất động sản khác", false, false);

                document.getElementById('ddlPriceType').options[1]=new Option("Triệu", "Triệu", false, false);
                document.getElementById('ddlPriceType').options[2]=new Option("Tỷ", "Tỷ", false, false);
                document.getElementById('ddlPriceType').options[3]=new Option("Trăm nghìn/m2", "Trăm nghìn/m2", false, false);
                document.getElementById('ddlPriceType').options[4]=new Option("Triệu/m2", "Triệu/m2", false, false);

            }else{
                document.getElementById('type_article').options[0]=new Option("-- Phân mục --", "", false, false);
                document.getElementById('type_article').options[1]=new Option("Cần thuê căn hộ chung cư", "Cần thuê căn hộ chung cư", false, false);
                document.getElementById('type_article').options[2]=new Option("Cần thuê nhà riêng", "Cần thuê nhà riêng", false, false);
                document.getElementById('type_article').options[3]=new Option("Cần thuê nhà mặt phố", "Cần thuê nhà mặt phố", false, false);
                document.getElementById('type_article').options[4]=new Option("Cần thuê nhà trọ, phòng trọ", "Cần thuê nhà trọ, phòng trọ", false, false);
                document.getElementById('type_article').options[5]=new Option("Cần thuê văn phòng", "Cần thuê văn phòng", false, false);
                document.getElementById('type_article').options[6]=new Option("Cần thuê cửa hàng, ki ốt", "Cần thuê cửa hàng, ki ốt", false, false);
                document.getElementById('type_article').options[7]=new Option("Cần thuê kho, nhà xưởng, đất", "Cần thuê kho, nhà xưởng, đất", false, false);
                document.getElementById('type_article').options[8]=new Option("Cần thuê loại bất động sản khác", "Cần thuê loại bất động sản khác", false, false);

                document.getElementById('ddlPriceType').options[1]=new Option("Nghìn/tháng", "Nghìn/tháng", false, false);
                document.getElementById('ddlPriceType').options[2]=new Option("Triệu/tháng", "Triệu/tháng", false, false);
                document.getElementById('ddlPriceType').options[2]=new Option("Triệu", "Triệu", false, false);
                document.getElementById('ddlPriceType').options[2]=new Option("Tỷ", "Tỷ", false, false);
                document.getElementById('ddlPriceType').options[3]=new Option("Nghìn/m2/tháng", "Nghìn/m2/tháng", false, false);
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
        if(old('ddlPriceType') ?? $article->ddlPriceType ?? false){
            ?>
            document.getElementById('ddlPriceType').value = '<?php echo old('ddlPriceType') ?? $article->ddlPriceType ?? '' ?>';
            <?php
        }
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
            $('#price_type').html('<?php echo old('ddlPriceType') ?? $article->ddlPriceType ?? '' ?>');
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