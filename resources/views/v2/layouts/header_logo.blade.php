<?php
use App\Library\Helpers;
?>
<div id="apus-mobile-menu" class="apus-offcanvas hidden-lg hidden-md">
    <div class="apus-offcanvas-body">
        <div class="offcanvas-head bg-primary">
            <a class="btn-toggle-canvas" data-toggle="offcanvas">
                <i class="fa fa-close"></i> <strong>MENU</strong>
            </a>
        </div>
        <nav class="navbar navbar-offcanvas navbar-static" role="navigation">
            <div class="navbar-collapse navbar-offcanvas-collapse">
                <ul id="main-mobile-menu" class="nav navbar-nav">
                    <li id="menu-item-2490" class="has-submenu active menu-item-2490">
                        <a href="{{env("APP_URL")}}/nha-dat-ban">Nhà đất bán</a> <span class="icon-toggle"><i class="fa fa-plus"></i></span>
                        <ul class="sub-menu">
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ban-can-ho-chung-cu">Bán căn hộ chung cư</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ban-nha-rieng">Bán nhà riêng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ban-biet-thu-lien-ke">Bán biệt thự, liền kề</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ban-nha-mat-pho">Bán nhà mặt phố</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ban-dat-nen-du-an">Bán đất nền dự án</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ban-dat">Bán đất</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ban-trang-trai-khu-nghi-duong">Bán trang trại, khu nghỉ dưỡng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ban-kho-nha-xuong">Bán kho, nhà xưởng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ban-loai-bat-dong-san-khac">Bán loại bất động sản khác</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul id="main-mobile-menu" class="nav navbar-nav">
                    <li id="menu-item-2490" class="has-submenu active menu-item-2490">
                        <a href="{{env("APP_URL")}}/nha-dat-cho-thue">Nhà đất cho thuê</a> <span class="icon-toggle"><i class="fa fa-plus"></i></span>
                        <ul class="sub-menu">
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/cho-thue-can-ho-chung-cu">Cho thuê căn hộ chung cư</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/cho-thue-nha-rieng">Cho thuê nhà riêng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/cho-thue-nha-mat-pho">Cho thuê nhà mặt phố</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/cho-thue-nha-tro-phong-tro">Cho thuê nhà trọ, phòng trọ</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/cho-thue-van-phong">Cho thuê văn phòng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/cho-thue-cua-hang-ki-ot">Cho thuê cửa hàng - ki ốt</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/cho-thue-kho-nha-xuong-dat">Cho thuê kho, nhà xưởng, đất</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/cho-thue-loai-bat-dong-san-khac">Cho thuê loại bất động sản khác</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul id="main-mobile-menu" class="nav navbar-nav">
                    <li id="menu-item-2490" class="has-submenu active menu-item-2490">
                        <a href="{{env("APP_URL")}}/nha-dat-can-mua">Nhà đất cần mua</a> <span class="icon-toggle"><i class="fa fa-plus"></i></span>
                        <ul class="sub-menu">
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/mua-nha-rieng">Mua nhà riêng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/mua-nha-biet-thu-lien-ke">Mua nhà biệt thự, liền kề</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/mua-nha-mat-pho">Mua nhà mặt phố</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/mua-dat-nen-du-an">Mua đất nền dự án</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/mua-dat">Mua đất</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/mua-trang-trai-khu-nghi-duong">Mua trang trại, khu nghỉ dưỡng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/mua-kho-nha-xuong">Mua kho, nhà xưởng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/mua-cac-loai-bat-dong-san-khac">Mua loại bất động sản khác</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul id="main-mobile-menu" class="nav navbar-nav">
                    <li id="menu-item-2490" class="has-submenu active menu-item-2490">
                        <a href="{{env("APP_URL")}}/nha-dat-can-thue">Nhà đất cần thuê</a> <span class="icon-toggle"><i class="fa fa-plus"></i></span>
                        <ul class="sub-menu">
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/can-thue-can-ho-chung-cu">Cần thuê căn hộ chung cư</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/can-thue-nha-rieng">Cần thuê nhà riêng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/can-thue-nha-mat-pho">Cần thuê nhà mặt phố</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/can-thue-nha-tro-phong-tro">Cần thuê nhà trọ, phòng trọ</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/can-thue-van-phong">Cần thuê văn phòng</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/can-thue-cua-hang-ki-ot">Cần thuê cửa hàng - ki ốt</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/can-thue-kho-nha-xuong-dat">Cần thuê kho, nhà xưởng, đất</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/can-thue-loai-bat-dong-san-khac">Cần thuê loại bất động sản khác</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul id="main-mobile-menu" class="nav navbar-nav">
                    <li id="menu-item-2490" class="has-submenu active menu-item-2490">
                        <a href="{{env("APP_URL")}}/loi-khuyen">Lời khuyên</a> <span class="icon-toggle"><i class="fa fa-plus"></i></span>
                        <ul class="sub-menu">
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-mua">Lời khuyên cho người mua</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-ban">Lời khuyên cho người bán</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/loi-khuyen-cho-nha-dau-tu">Lời khuyên cho nhà đầu tư</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-thue">Lời khuyên cho người thuê</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-cho-thue">Lời khuyên cho người cho thuê</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul id="main-mobile-menu" class="nav navbar-nav">
                    <li id="menu-item-2490" class="has-submenu active menu-item-2490">
                        <a href="javascript:void(0)">Nhà môi giới</a> <span class="icon-toggle"><i class="fa fa-plus"></i></span>
                        <ul class="sub-menu">
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/cong-ty-moi-gioi">Công ty môi giới</a>
                            </li>
                            <li class="menu-item-2797">
                                <a href="{{env("APP_URL")}}/ca-nhan-moi-gioi">Cá nhân môi giới</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul id="main-mobile-menu" class="nav navbar-nav">
                    <li id="menu-item-2490" class="has-submenu active menu-item-2490">
                        <a href="{{env("APP_URL")}}/du-an">Dự Án</a>
                    </li>
                </ul>
                <ul id="main-mobile-menu" class="nav navbar-nav">
                    <li id="menu-item-2490" class="has-submenu active menu-item-2490">
                        <a href="{{env("APP_URL")}}/ho-tro">Hỗ trợ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="over-dark"></div>
<div id="apus-header-mobile" class="header-mobile hidden-lg hidden-md clearfix">
    <div class="container">
        <div class="logo logo-theme  pull-left">
            <a href="/">
                <img src="/imgs/logo@3x.png" alt="BatDongSan.ooo" style="width: 160px; height: 77px;">
            </a>
        </div>
        <div class="pull-right header-mobile-right">
            <button data-toggle="offcanvas" class="btn btn-offcanvas btn-toggle-canvas offcanvas pull-left"
                    type="button">
                <i class="fa fa-bars"></i>
            </button>
            <div class="pull-left">
                <div class="btn-group">
                    @if(!Auth::check())
                    <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="icon-ap_settings"
                                                                          aria-hidden="true"></i></button>
                    <div class="user-menu dropdown-menu dropdown-menu-right dropdown-theme">
                        <ul class="nav navbar-nav menu login">
                            <li><a href="#customer_login">Đăng Nhập</a></li>
                            <li><a href="#customer_register">Đăng Ký</a></li>
                        </ul>
                    </div>
                    @else
                        <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-ap_settings" aria-hidden="true"></i></button>
                        <div class="user-menu dropdown-menu dropdown-menu-right dropdown-theme">
                            <ul class="nav navbar-nav menu profile_login">
                                <li><a href="/thong-tin-ca-nhan"><img src="/imgs/user.png" style="display: block; float: left; margin-top: 1px; margin-right: 5px;">{{Auth::user()->name}}</a></li>
                                <li><a href="/logout" class="line_user_name" rel="nofollow">Thoát</a></li>
                            </ul>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<header id="apus-header" class="apus-header header-v1 hidden-sm hidden-xs" role="banner">
    <div class="header-middle">
        <div class="container">
            <div class="pull-left">
                <div class="logo-in-theme ">
                    <div class="logo logo-theme">
                        <a href="index.html">
                            <img src="/imgs/logo@3x.png" alt="BatDongSan.ooo" style="width: 160px; height: 77px;">
                        </a>
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin-top: 20px;">
                <div class="header-infor pull-left">
                    <aside id="apus_contact_info-2" class="widget widget_apus_contact_info">
                        <div class="contact-info-widget">
                            <div class="pull-left">
                                <div class="collapse navbar-collapse">
                                    @if(!Auth::check())
                                    <ul id="login" class="login">
                                        <li><a href="#customer_login">Đăng nhập</a></li>
                                        <li><a href="#customer_register">Đăng Ký</a></li>
                                    </ul>
                                    @else
                                        <ul class="profile_login">
                                        <li><a href="/thong-tin-ca-nhan"><img src="/imgs/user.png" style="display: block; float: left; margin-top: 1px; margin-right: 5px;">{{Auth::user()->name}}</a></li>
                                        <li><a href="/logout" class="line_user_name" rel="nofollow">Thoát</a></li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="media address-info pull-left">
                                <div class="media-left media-middle">
                                    <div class="icon">
                                        <img src="wp-content/uploads/2017/08/Shape-11.png" alt="">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="content">0899 675 679<br/>
                                        hotro@batdongsan.ooo
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="main-sticky-header-wrapper">
        <div class="main-sticky-header">
            <div class="header-bottom">
                <div class="container">
                    <div class="bottom-inner clearfix">
                        <div class="main-menu pull-left">
                            <nav data-duration="400"
                                 class="hidden-xs hidden-sm apus-megamenu slide animate navbar p-static"
                                 role="navigation">
                                <div class="collapse navbar-collapse">
                                    <ul id="primary-menu" class="nav navbar-nav megamenu">
                                        <li class="dropdown menu-item-2809 aligned-left">
                                            <a href="{{env("APP_URL")}}/nha-dat-ban"class="dropdown-toggle" data-hover="dropdown"data-toggle="dropdown">Nhà đất bán<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/ban-can-ho-chung-cu">Bán căn hộ chung cư</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/ban-nha-rieng">Bán nhà riêng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/ban-biet-thu-lien-ke">Bán biệt thự, liền kề</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/ban-nha-mat-pho">Bán nhà mặt phố</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/ban-dat-nen-du-an">Bán đất nền dự án</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/ban-dat">Bán đất</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/ban-trang-trai-khu-nghi-duong">Bán trang trại, khu nghỉ dưỡng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/ban-kho-nha-xuong">Bán kho, nhà xưởng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/ban-loai-bat-dong-san-khac">Bán loại bất động sản khác</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="dropdown menu-item-2809 aligned-left">
                                            <a href="{{env("APP_URL")}}/nha-dat-cho-thue"class="dropdown-toggle" data-hover="dropdown"data-toggle="dropdown">Đất cho thuê<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/cho-thue-can-ho-chung-cu">Cho thuê căn hộ chung cư</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/cho-thue-nha-rieng">Cho thuê nhà riêng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/cho-thue-nha-mat-pho">Cho thuê nhà mặt phố</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/cho-thue-nha-tro-phong-tro">Cho thuê nhà trọ, phòng trọ</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/cho-thue-van-phong">Cho thuê văn phòng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/cho-thue-cua-hang-ki-ot">Cho thuê cửa hàng - ki ốt</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/cho-thue-kho-nha-xuong-dat">Cho thuê kho, nhà xưởng, đất</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/cho-thue-loai-bat-dong-san-khac">Cho thuê loại bất động sản khác</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="dropdown menu-item-2809 aligned-left">
                                            <a href="{{env("APP_URL")}}/nha-dat-can-mua"class="dropdown-toggle" data-hover="dropdown"data-toggle="dropdown">Đất cần mua<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/mua-nha-rieng">Mua nhà riêng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/mua-nha-biet-thu-lien-ke">Mua nhà biệt thự, liền kề</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/mua-nha-mat-pho">Mua nhà mặt phố</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/mua-dat-nen-du-an">Mua đất nền dự án</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/mua-dat">Mua đất</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/mua-trang-trai-khu-nghi-duong">Mua trang trại, khu nghỉ dưỡng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/mua-kho-nha-xuong">Mua kho, nhà xưởng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/mua-cac-loai-bat-dong-san-khac">Mua loại bất động sản khác</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown menu-item-2809 aligned-left">
                                            <a href="{{env("APP_URL")}}/nha-dat-can-thue"class="dropdown-toggle" data-hover="dropdown"data-toggle="dropdown">Đất cần thuê<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/can-thue-can-ho-chung-cu">Cần thuê căn hộ chung cư</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/can-thue-nha-rieng">Cần thuê nhà riêng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/can-thue-nha-mat-pho">Cần thuê nhà mặt phố</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/can-thue-nha-tro-phong-tro">Cần thuê nhà trọ, phòng trọ</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/can-thue-van-phong">Cần thuê văn phòng</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/can-thue-cua-hang-ki-ot">Cần thuê cửa hàng - ki ốt</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/can-thue-kho-nha-xuong-dat">Cần thuê kho, nhà xưởng, đất</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/can-thue-loai-bat-dong-san-khac">Cần thuê loại bất động sản khác</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="dropdown menu-item-2809 aligned-left">
                                            <a href="{{env("APP_URL")}}/loi-khuyen"class="dropdown-toggle" data-hover="dropdown"data-toggle="dropdown">Lời khuyên<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-mua">Lời khuyên cho người mua</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-ban">Lời khuyên cho người bán</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/loi-khuyen-cho-nha-dau-tu">Lời khuyên cho nhà đầu tư</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-thue">Lời khuyên cho người thuê</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-cho-thue">Lời khuyên cho người cho thuê</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="dropdown menu-item-2809 aligned-left">
                                            <a href="javascript:void(0)"class="dropdown-toggle" data-hover="dropdown"data-toggle="dropdown">Nhà môi giới<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/cong-ty-moi-gioi">Công ty môi giới</a>
                                                </li>
                                                <li class="menu-item-2934 aligned-">
                                                    <a href="{{env("APP_URL")}}/lca-nhan-moi-gioi">Cá nhân môi giới</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown menu-item-2809 aligned-left">
                                            <a href="{{env("APP_URL")}}/du-an"class="dropdown-toggle" data-hover="dropdown"data-toggle="dropdown">Dự Án</a>
                                        </li>
                                        <li class="dropdown menu-item-2809 aligned-left">
                                            <a href="{{env("APP_URL")}}/ho-tro"class="dropdown-toggle" data-hover="dropdown"data-toggle="dropdown">Hỗ trợ</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="pull-right">
                        @if(!Auth::check())
                        <div class="login dang_tin">
                            <a class="btn btn-submit" href="#customer_login"><i class="ion-ios-plus-empty"></i>Đăng Tin</a>
                        </div>

                        @else
                        <a class="btn btn-submit" href="/quan-ly-tin/dang-tin-ban-cho-thue"><i class="ion-ios-plus-empty"></i>Đăng Tin</a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>