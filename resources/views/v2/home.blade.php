<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
global $location_province_article_lease;
?>
@include('cache.location_province_article_lease')
@extends('v2.layouts.app')
@section('meta')
    <base href="{{env('APP_URL')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta name="author" content="Bat Dong San OOO">
    <meta name="copyright" content="{{env('APP_DOMAIN')}}" />
    <meta name="revisit-after" content="7 Days">
    <meta name="keywords" content="batdongsan; rao ban bat dong san; bds; bat dong san Ho Chi Minh; bat dong san Ha Noi; cap nhat bat dong san; thu bat dong san; mua dat; thue dat; can thue nha; can thue dat">
    <meta name="description" content="Nhà đất bán, Bán căn hộ chung cư, Bán nhà biệt thự, liền kề, Bán nhà mặt phố, Bán đất nền dự án, Bán đất, Nhà đất cho thuê, Cho thuê căn hộ chung cư,
        Cho thuê nhà riêng, Cho thuê nhà mặt phố, Cho thuê nhà trọ, phòng trọ, Cho thuê văn phòng, Cho thuê kho, nhà xưởng, đất, Mua nhà riêng, Cần thuê kho, nhà xưởng, đất, Cần thuê nhà trọ, phòng trọ, Tất cả các loại đất bán">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="image_src" href="{{env('APP_URL') . THUMBNAIL_DEFAULT_META}}" />
    <meta name="title" content="Bất Động Sản OOO" />
    <meta property="og:image" content="{{env('APP_URL') . THUMBNAIL_DEFAULT_META}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="Bất Động Sản OOO" />
    <meta property="og:description" content="batdongsan; rao ban bat dong san; bds; bat dong san Ho Chi Minh; bat dong san Ha Noi; cap nhat bat dong san; thu bat dong san; mua dat; thue dat; can thue nha; can thue dat">
    <meta name="description" content="Nhà đất bán, Bán căn hộ chung cư, Bán nhà biệt thự, liền kề, Bán nhà mặt phố, Bán đất nền dự án, Bán đất, Nhà đất cho thuê, Cho thuê căn hộ chung cư,
        Cho thuê nhà riêng, Cho thuê nhà mặt phố, Cho thuê nhà trọ, phòng trọ, Cho thuê văn phòng, Cho thuê kho, nhà xưởng, đất, Mua nhà riêng, Cần thuê kho, nhà xưởng, đất, Cần thuê nhà trọ, phòng trọ, Tất cả các loại đất bán" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
@section('content')
    <body class="home page-template-default page page-id-5 header-transparent apus-body-loading image-lazy-loading wpb-js-composer js-comp-ver-5.1.1 vc_responsive">
    <div class="apus-page-loading">
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
        <div id="apus-main-content">
            <section id="main-container" class="container inner">
                <div class="row">
                    <div id="main-content" class="main-page col-xs-12">
                        <main id="main" class="site-main" role="main">
                            <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true"
                                 class="vc_row wpb_row vc_row-fluid"
                                 style="position: relative; left: -183px; box-sizing: border-box; width: 1536px;">
                                <div style="">
                                    <div class="property-box-slider property-box-slider-wrapper has-img">
                                        <div class="image-wrapper image-loaded"><img src="/wp-content/uploads/2017/08/living-room-527646_1920-1920x670.jpg" width="1920" height="670">
                                        </div>
                                        <div class="content">
                                            <div class="container">
                                                <div class="property-box-slider-content">
                                                    <div class="bottom-content">
                                                        <div class="widget widget-filter-form  home1">
                                                            <div class="filter-property-form " method="get"
                                                                 action="/">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <select class="form-control" name="filter-location" id="search-advance-method">
                                                                                <option class="advance-options" value="-1">-- Chọn loại nhà đất --</option>
                                                                                <option class="advance-options" value="nha-dat-ban">- Nhà đất bán</option>
                                                                                <option class="advance-options" value="nha-dat-cho-thue">- Nhà đất cho thuê</option>
                                                                                <option class="advance-options" value="nha-dat-can-mua">- Nhà đất cần mua</option>
                                                                                <option class="advance-options" value="nha-dat-can-thue">- Nhà đất cần thuê</option>
                                                                                <option class="advance-options" value="ban-can-ho-chung-cu">- Bán căn hộ chung cư</option>
                                                                                <option class="advance-options" value="tat-ca-nha-ban">- Tất cả các loại nhà bán</option>
                                                                                <option class="advance-options" value="ban-nha-rieng">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà riêng </option>
                                                                                <option class="advance-options" value="ban-biet-thu-lien-ke">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán biệt thự, liền kề</option>
                                                                                <option class="advance-options" value="ban-nha-mat-pho">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà mặt phố</option>
                                                                                <option class="advance-options" value="tat-ca-dat-ban">- Tất cả các loại đất bán</option>
                                                                                <option class="advance-options" value="ban-dat-nen-du-an">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất nền dự án</option>
                                                                                <option class="advance-options" value="ban-dat">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất </option>
                                                                                <option class="advance-options" value="ban-trang-trai-khu-nghi-duong">- Bán trang trại, khu nghỉ dưỡng</option>
                                                                                <option class="advance-options" value="ban-kho-nha-xuong">- Bán kho, nhà xưởng</option>
                                                                                <option class="advance-options" value="ban-loai-bat-dong-san-khac">- Bán loại bất động sản khác</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group group-select">
                                                                            <select class="select-province form-control" id="select-province">
                                                                                <option value="-1">-- Chọn Tỉnh/Thành phố --</option>
                                                                                <option value="1">Hồ Chí Minh</option>
                                                                                <option value="2">Hà Nội</option>
                                                                                <option value="3">Đà Nẵng</option>
                                                                                <option value="4">Bình Dương</option>
                                                                                <option value="5">Đồng Nai</option>
                                                                                <option value="6">Khánh Hòa</option>
                                                                                <option value="7">Hải Phòng</option>
                                                                                <option value="8">Long An</option>
                                                                                <option value="9">Quảng Nam</option>
                                                                                <option value="10">Bà Rịa Vũng Tàu</option>
                                                                                <option value="11">Đắk Lắk</option>
                                                                                <option value="12">Cần Thơ</option>
                                                                                <option value="13">Bình Thuận  </option>
                                                                                <option value="14">Lâm Đồng</option>
                                                                                <option value="15">Thừa Thiên Huế</option>
                                                                                <option value="16">Kiên Giang</option>
                                                                                <option value="17">Bắc Ninh</option>
                                                                                <option value="18">Quảng Ninh</option>
                                                                                <option value="19">Thanh Hóa</option>
                                                                                <option value="20">Nghệ An</option>
                                                                                <option value="21">Hải Dương</option>
                                                                                <option value="22">Gia Lai</option>
                                                                                <option value="23">Bình Phước</option>
                                                                                <option value="24">Hưng Yên</option>
                                                                                <option value="25">Bình Định</option>
                                                                                <option value="26">Tiền Giang</option>
                                                                                <option value="27">Thái Bình</option>
                                                                                <option value="28">Bắc Giang</option>
                                                                                <option value="29">Hòa Bình</option>
                                                                                <option value="30">An Giang</option>
                                                                                <option value="31">Vĩnh Phúc</option>
                                                                                <option value="32">Tây Ninh</option>
                                                                                <option value="33">Thái Nguyên</option>
                                                                                <option value="34">Lào Cai</option>
                                                                                <option value="35">Nam Định</option>
                                                                                <option value="36">Quảng Ngãi</option>
                                                                                <option value="37">Bến Tre</option>
                                                                                <option value="38">Đắk Nông</option>
                                                                                <option value="39">Cà Mau</option>
                                                                                <option value="40">Vĩnh Long</option>
                                                                                <option value="41">Ninh Bình</option>
                                                                                <option value="42">Phú Thọ</option>
                                                                                <option value="43">Ninh Thuận</option>
                                                                                <option value="44">Phú Yên</option>
                                                                                <option value="45">Hà Nam</option>
                                                                                <option value="46">Hà Tĩnh</option>
                                                                                <option value="47">Đồng Tháp</option>
                                                                                <option value="48">Sóc Trăng</option>
                                                                                <option value="49">Kon Tum</option>
                                                                                <option value="50">Quảng Bình</option>
                                                                                <option value="51">Quảng Trị</option>
                                                                                <option value="52">Trà Vinh</option>
                                                                                <option value="53">Hậu Giang</option>
                                                                                <option value="54">Sơn La</option>
                                                                                <option value="55">Bạc Liêu</option>
                                                                                <option value="56">Yên Bái</option>
                                                                                <option value="57">Tuyên Quang</option>
                                                                                <option value="58">Điện Biên</option>
                                                                                <option value="59">Lai Châu</option>
                                                                                <option value="60">Lạng Sơn</option>
                                                                                <option value="61">Hà Giang</option>
                                                                                <option value="62">Bắc Kạn</option>
                                                                                <option value="63">Cao Bằng</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group group-select">
                                                                            <select class="form-control select-district">
                                                                                <option value="-1" class="advance-options">-- Chọn Quận/Huyện --</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3 hidden">
                                                                        <div class="form-group group-select">
                                                                            <select class="form-control select-ward" >
                                                                                <option value="-1" class="advance-options">-- Chọn Phường/Xã --
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group group-select">
                                                                            <select class="form-control select-street">
                                                                                <option value="-1" class="advance-options">-- Chọn Đường/Phố --</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">

                                                                        <div class="form-group group-select">
                                                                            <select id="search-advance-area" class="form-control" style="min-width: 200px;">
                                                                                <option value="-1" class="advance-options" >-- Chọn diện tích --
                                                                                </option>
                                                                                <option value="0" class="advance-options" >Chưa xác định</option>
                                                                                <option value="1" class="advance-options" >&lt;= 30
                                                                                    m2
                                                                                </option>
                                                                                <option value="2" class="advance-options" >30 - 50
                                                                                    m2
                                                                                </option>
                                                                                <option value="3" class="advance-options" >50 - 80
                                                                                    m2
                                                                                </option>
                                                                                <option value="4" class="advance-options" >80 - 100
                                                                                    m2
                                                                                </option>
                                                                                <option value="5" class="advance-options" >100 - 150
                                                                                    m2
                                                                                </option>
                                                                                <option value="6" class="advance-options" >150 - 200
                                                                                    m2
                                                                                </option>
                                                                                <option value="7" class="advance-options" >200 - 250
                                                                                    m2
                                                                                </option>
                                                                                <option value="8" class="advance-options" >250 - 300
                                                                                    m2
                                                                                </option>
                                                                                <option value="9" class="advance-options" >300 - 500
                                                                                    m2
                                                                                </option>
                                                                                <option value="10" class="advance-options" >&gt;= 500
                                                                                    m2
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group group-select">
                                                                            <select class="form-control" id="search-advance-price">
                                                                                <option value="-1" class="advance-options">-- Chọn mức giá --</option>
                                                                                <option value="0" class="advance-options">Thỏa thuận</option>
                                                                                <option value="1" class="advance-options">&lt; 500 triệu</option>
                                                                                <option value="2" class="advance-options">500 - 800 triệu</option>
                                                                                <option value="3" class="advance-options">800 triệu - 1 tỷ</option>
                                                                                <option value="4" class="advance-options">1 - 2 tỷ</option>
                                                                                <option value="5" class="advance-options">2 - 3 tỷ</option>
                                                                                <option value="6" class="advance-options">3 - 5 tỷ</option>
                                                                                <option value="7" class="advance-options">5 - 7 tỷ</option>
                                                                                <option value="8" class="advance-options">7 - 10 tỷ</option>
                                                                                <option value="9" class="advance-options">10 - 20 tỷ</option>
                                                                                <option value="10" class="advance-options">20 - 30 tỷ</option>
                                                                                <option value="11" class="advance-options">&gt; 30 tỷ</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group group-select">
                                                                            <select id="search-advance-bed_room" class="form-control">
                                                                                <option value="-1" class="advance-options">-- Chọn số phòng ngủ --</option>
                                                                                <option value="0" class="advance-options">Không xác định </option>
                                                                                <option value="1" class="advance-options">1+</option>
                                                                                <option value="2" class="advance-options">2+</option>
                                                                                <option value="3" class="advance-options">3+</option>
                                                                                <option value="4" class="advance-options">4+</option>
                                                                                <option value="5" class="advance-options">5+</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3 hidden">
                                                                        <div class="form-group group-select">
                                                                            <select id="search-advance-toilet" class="form-control">
                                                                                <option value="-1" class="advance-options">-- Chọn số toilet --</option>
                                                                                <option value="0" class="advance-options">Không xác định </option>
                                                                                <option value="1" class="advance-options">1+</option>
                                                                                <option value="2" class="advance-options">2+</option>
                                                                                <option value="3" class="advance-options">3+</option>
                                                                                <option value="4" class="advance-options">4+</option>
                                                                                <option value="5" class="advance-options">5+</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3 hidden">
                                                                        <div class="form-group group-select">
                                                                            <select id="search-advance-ddlHomeDirection" class="form-control" >
                                                                                <option value="-1">-- Chọn hướng nhà --</option>
                                                                                <option value="KXĐ" class="advance-options">KXĐ</option>
                                                                                <option value="Đông" class="advance-options">Đông</option>
                                                                                <option value="Tây" class="advance-options">Tây</option>
                                                                                <option value="Nam" class="advance-options">Nam</option>
                                                                                <option value="Bắc" class="advance-options">Bắc</option>
                                                                                <option value="Đông-Bắc" class="advance-options">Đông-Bắc</option>
                                                                                <option value="Tây-Bắc" class="advance-options">Tây-Bắc</option>
                                                                                <option value="Tây-Nam" class="advance-options">Tây-Nam</option>
                                                                                <option value="Đông-Nam" class="advance-options">Đông-Nam</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="visiable-line pull-right">
                                                                            <button onclick="searchAdvance()" class="button btn btn-purple btn-search"><i class="fa fa-search"></i> Tìm Kiếm</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="advance-fields clearfix">
                                                                    <div class="row">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row-full-width vc_clearfix"></div>
                            <div data-vc-full-width="true" data-vc-full-width-init="false"
                                 class="vc_row wpb_row vc_row-fluid vc_custom_1502674730490 vc_row-has-fill">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="vc_empty_space  hidden-sm hidden-xs" style="height: 25px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                            <div class="vc_empty_space" style="height: 30px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                            <div id="widget-propertiesKPBhx"
                                                 class="widget widget-properties  layout-mansory">
                                                <div class="clearfix">
                                                    {{--<div class="contract-filter">--}}
                                                    {{--<ul class="isotope-filter"--}}
                                                    {{--data-related-grid="isotope-items-KPBhx">--}}
                                                    {{--<li><a href="#" data-filter=".all">All</a></li>--}}
                                                    {{--<li><a href="#" data-filter=".SALE">For Rent</a></li>--}}
                                                    {{--<li><a href="#" data-filter=".RENT">For Sale</a></li>--}}
                                                    {{--</ul>--}}
                                                    {{--</div>--}}
                                                </div>

                                                <div class="widget-text-heading default">
                                                    <h3 class="title"><span>TIN RAO</span> CHO BẠN <div class="pull-right"><a class="link-text-heading" href="/nha-dat-ban">Nhà Đất Bán</a> <span class="link-text-heading">/</span> <a class="link-text-heading" href="/nha-dat-cho-thue"> Nhà Đất Cho Thuê</a></div></h3>
                                                </div>


                                                <div class="widget-content">
                                                    <div class="properties-grid">
                                                        <div id="isotope-items-KPBhx" class="isotope-items row" data-isotope-duration="400">
                                                            @foreach($articleForLease as $item)
                                                                <?php
                                                                $img_ = $item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT;
                                                                $link_url = $item->prefix_url.'-bds-'.$item->id;
                                                                $price = ($item->price_from != null && $item->price_to != null) ? ($item->price_to ? ($item->price_from. ' - ' .$item->price_to) : $item->price_from).' '.$item->ddlPriceType : ($item->price_real == 0 ? 'Thỏa thuận' : $item->price.' '.$item->ddlPriceType);
                                                                $area = ($item->area_from != null && $item->area_to != null) ? ($item->area_to ? ($item->area_from. ' - ' .$item->area_to) : $item->area_from).' m²' : ($item->area ? $item->area.' m²' : 'Chưa xác định');
                                                                if($item->method_article == 'Nhà đất cần mua') {
                                                                    $searchMethod = 'nha-dat-can-mua';
                                                                }elseif($item->method_article == 'Nhà đất cần thuê') {
                                                                    $searchMethod = 'nha-dat-can-thue';
                                                                }elseif($item->method_article == 'Nhà đất bán') {
                                                                    $searchMethod = 'nha-dat-ban';
                                                                }elseif($item->method_article == 'Nhà đất cho thuê') {
                                                                    $searchMethod = 'nha-dat-cho-thue';
                                                                }
                                                                ?>
                                                                <div class="isotope-item all SALE col-md-3 col-sm-4 {{$item->type_vip == ARTICLE_VIP_DIAMOND ? 'article_vip_diamond' : $item->type_vip == ARTICLE_VIP_GOLD ? 'article_vip_gold' : $item->type_vip == ARTICLE_VIP_SILVER ? 'article_vip_silver' : $item->type_vip == ARTICLE_VIP_NORMAL ? 'article_vip_normal' : ''}}" data-category="SALE">
                                                                    <div class="property-box property-box-grid property-box-wrapper property_box_vip"
                                                                         data-latitude="40.5795317"
                                                                         data-longitude="-74.15020070000003"
                                                                         data-markerid="marker-3076">
                                                                        <div class="property-box-image ">
                                                                            <a href="/{{$link_url}}"
                                                                               class="property-box-image-inner">
                                                                                <div>
                                                                                    <img src="{{$img_}}" data-src="{{$img_}}" style="{{$Agent->isMobile() ? '' : 'width: 262px; height: 175px'}}" alt="{{$item['title']}}"/>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="property-box-content">
                                                                            <div class="property-box-title-wrap">
                                                                                <div class="property-box-title">
                                                                                    <h3 class="entry-title title_home_ellipsis title_home_vip"><a href="/{{$link_url}}">{{$item['title']}}</a></h3>
                                                                                    <div class="property-row-address">
                                                                                        <i class="icon-ap_pin"
                                                                                           aria-hidden="true"></i>
                                                                                        @if($item->district)
                                                                                            <a class="link_blue" href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item->province_id}}/{{$item->district_id}}/-1/-1/-1/-1/-1/-1/-1" title="Bán nhà riêng tại {{$item->district}}">{{$item->district}}</a>,
                                                                                        @endif
                                                                                        @if($item->province)
                                                                                            <a class="link_blue" href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item->province_id}}/-1/-1/-1/-1/-1/-1/-1/-1" title="Bán nhà riêng tại {{$item->province}}">{{$item->province}}</a>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="property-box-price text-theme">{{$price}}</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="property-box-field">
                                                                                <div class="property-box-meta">
                                                                                    <div class="field-item">
                                                                                        Diện Tích <span>{{$area}} </span> </div>
                                                                                    <div class="field-item">
                                                                                        Ngày đăng <span>{{date('d/m/Y', strtotime($item['created_at']))}}</span> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="clearfix load-product text-center space-tb-30">
                                                        <a href="#widget-propertiesKPBhx"
                                                           class="btn view-more-property " data-columns="4"
                                                           data-item_style="" data-layout_type="mansory"
                                                           data-contract="" data-orderby="latest" data-number="6"
                                                           data-types="" data-statuses="" data-locations=""
                                                           data-page="1" data-max-page="10">Xem Thêm Tin Rao</a>
                                                        <p class="all-properties-loaded hidden">Các Dự Án Vip Đã Hiển Thị Hết</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row-full-width vc_clearfix"></div>
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="vc_empty_space" style="height: 30px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                            <div class="vc_empty_space" style="height: 25px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                            <div class="widget-text-heading  default">
                                                <h3 class="title">
                                                    <span>TIN RAO BÁN</span> ĐỊA ĐIỂM </h3>
                                            </div>
                                            <div class="vc_empty_space" style="height: 25px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="widget widget-location-banner ">
                                                <a href="/tim-kiem-nang-cao/nha-dat-ban/{{$location_province_article_lease[0]['province_id']}}/-1/-1/-1/-1/-1/-1/-1/-1" class="widget-content">
                                                    <div>
                                                        <img src="wp-content/themes/homesweet/images/placeholder/l1-1.jpg"
                                                             data-src="wp-content/themes/homesweet/images/placeholder/l1-1.jpg"
                                                             alt="" class="unveil-image">
                                                    </div>
                                                    <div class="content-meta">
                                                        <h3 class="title">{{$location_province_article_lease[0]['province']}}</h3>
                                                        <div class="properties">
                                                            {{$location_province_article_lease[0]['total']}} Dự án
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="widget widget-location-banner ">
                                                <a href="/tim-kiem-nang-cao/nha-dat-ban/{{$location_province_article_lease[2]['province_id']}}/-1/-1/-1/-1/-1/-1/-1/-1" class="widget-content">
                                                    <div>
                                                        <img src="wp-content/themes/homesweet/images/placeholder/l2.jpg"
                                                             data-src="wp-content/themes/homesweet/images/placeholder/l2.jpg"
                                                             alt="" class="unveil-image">
                                                    </div>
                                                    <div class="content-meta">
                                                        <h3 class="title">{{$location_province_article_lease[2]['province']}}</h3>
                                                        <div class="properties">
                                                            {{$location_province_article_lease[2]['total']}} Dự án
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="widget widget-location-banner ">
                                                                <a href="/tim-kiem-nang-cao/nha-dat-ban/{{$location_province_article_lease[1]['province_id']}}/-1/-1/-1/-1/-1/-1/-1/-1"
                                                                   class="widget-content">
                                                                    <div>
                                                                        <img src="wp-content/themes/homesweet/images/placeholder/l3.jpg"
                                                                             data-src="wp-content/themes/homesweet/images/placeholder/l3.jpg"
                                                                             alt="" class="unveil-image">
                                                                    </div>
                                                                    <div class="content-meta">
                                                                        <h3 class="title">{{$location_province_article_lease[1]['province']}}</h3>
                                                                        <div class="properties">
                                                                            {{$location_province_article_lease[1]['total']}} Dự án
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="widget widget-location-banner ">
                                                                <a href="/tim-kiem-nang-cao/nha-dat-ban/{{$location_province_article_lease[3]['province_id']}}/-1/-1/-1/-1/-1/-1/-1/-1"
                                                                   class="widget-content">
                                                                    <div>
                                                                        <img src="wp-content/themes/homesweet/images/placeholder/l4.jpg"
                                                                             data-src="/wp-content/themes/homesweet/images/placeholder/l4.jpg"
                                                                             alt="" class="unveil-image">
                                                                    </div>
                                                                    <div class="content-meta">
                                                                        <h3 class="title">{{$location_province_article_lease[3]['province']}}</h3>
                                                                        <div class="properties">
                                                                            {{$location_province_article_lease[3]['total']}} Dự án
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_row-fluid hidden-sm hidden-xs">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="vc_empty_space" style="height: 40px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row-full-width vc_clearfix"></div>
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="widget-text-heading default">
                                                <h3 class="title"><span>DỰ ÁN</span> NỖI BẬT<div class="pull-right"><a href="/du-an-noi-bat" class="link-text-heading">Xem thêm</a></div></h3>
                                            </div>
                                            <div class="vc_empty_space" style="height: 20px"><span class="vc_empty_space_inner"></span></div>
                                            <div class="widget widget-agents carousel">
                                                <div class="owl-carousel " data-items="4" data-carousel="owl" data-smallmedium="2" data-extrasmall="1" data-pagination="false" data-nav="true">
                                                    @foreach($articleFeature as $item)
                                                        <?php
                                                        $img_ = $item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT;
                                                        $link_url = $item->prefix_url.'-bds-'.$item->id;
                                                        $price = ($item->price_from != null && $item->price_to != null) ? ($item->price_to ? ($item->price_from. ' - ' .$item->price_to) : $item->price_from).' '.$item->ddlPriceType : ($item->price_real == 0 ? 'Thỏa thuận' : $item->price.' '.$item->ddlPriceType);
                                                        if($item->method_article == 'Nhà đất cần mua') {
                                                            $searchMethod = 'nha-dat-can-mua';
                                                        }elseif($item->method_article == 'Nhà đất cần thuê') {
                                                            $searchMethod = 'nha-dat-can-thue';
                                                        }elseif($item->method_article == 'Nhà đất bán') {
                                                            $searchMethod = 'nha-dat-ban';
                                                        }elseif($item->method_article == 'Nhà đất cho thuê') {
                                                            $searchMethod = 'nha-dat-cho-thue';
                                                        }
                                                        ?>
                                                        <article class="agent-row agen-box post-3056 agent type-agent status-publish has-post-thumbnail hentry {{$item->type_vip == ARTICLE_VIP_DIAMOND ? 'article_vip_diamond' : $item->type_vip == ARTICLE_VIP_GOLD ? 'article_vip_gold' : $item->type_vip == ARTICLE_VIP_SILVER ? 'article_vip_silver' : $item->type_vip == ARTICLE_VIP_NORMAL ? 'article_vip_normal' : ''}}">
                                                            <div class="agent-row-content agent-grid property_box_vip">
                                                                <div class="agent-row-content-inner">
                                                                    <div class="agent-row-main">
                                                                        <div class="agent-top">
                                                                            <div class="agent-thumbnail">
                                                                                <a href="{{$link_url}}">
                                                                                    <img style="width: 263px ;height: 175px;" src="{{$img_}}"/>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="agent-row-body">
                                                                            <h2 class="entry-title title_home_ellipsis_feature title_home_vip">
                                                                                <a href="{{$link_url}}">{{$item['title']}}</a>
                                                                            </h2>
                                                                            <div class="agencies">
                                                                                @if($item->district)<a class="link_blue" href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item->province_id}}/{{$item->district_id}}/-1/-1/-1/-1/-1/-1/-1" title="Bán nhà riêng tại {{$item->district}}">{{$item->district}}</a>,@endif
                                                                                @if($item->province)<a class="link_blue" href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item->province_id}}/-1/-1/-1/-1/-1/-1/-1/-1" title="Bán nhà riêng tại {{$item->province}}">{{$item->province}}</a>@endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row-full-width vc_clearfix"></div>
                            <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1502181866467 vc_row-has-fill">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="vc_empty_space  hidden-sm hidden-xs" style="height: 30px"><span class="vc_empty_space_inner"></span></div>
                                            <div class="vc_empty_space" style="height: 30px"><span class="vc_empty_space_inner"></span></div>
                                            <div class="widget-text-heading  default">
                                                <h3 class="title"> <span>DOANH NGHIỆP</span><div class="pull-right"><a href="/doanh-nghiep" class="link-text-heading">Xem thêm</a></div></h3>

                                            </div>
                                            <div class="vc_empty_space" style="height: 15px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                            <div class="widget-brands  ">
                                                <div class="widget-content">
                                                    <div class="owl-carousel nav-style1 products" data-items="5" data-smallmedium="5" data-extrasmall="2" data-carousel="owl" data-pagination="false" data-nav="true">
                                                        @foreach($articlePartner as $item)
                                                            <div class="item">
                                                                <div class="item-wrapper">
                                                                    <a href="/doanh-nghiep/{{$item['slug']}}" target="_blank">
                                                                        <img width="135" height="64" src="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}}" class="attachment-full size-full wp-post-image" alt="{{$item['title']}}"/></a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vc_empty_space  hidden-sm hidden-xs" style="height: 40px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                            <div class="vc_empty_space" style="height: 20px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row-full-width vc_clearfix"></div>
                        </main>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('v2.layouts.footer')
    </body>
@endsection
