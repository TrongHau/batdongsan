<div class="header-top">
    <div class="header-top-left">
        <div style="padding-top: 5px;">
            <h1>
                <a href="/" title="Trang chủ"><img src="/imgs/logo@3x.png" alt="Kênh thông tin mua bán, cho thuê nhà đất số 1" style="padding-top: 2px; width: 100%;"></a>
            </h1>
        </div>
    </div>
    <div class="header-top-right">
        <div id="TopBanner">
            <div class="container-default">
                <div id="ctl21_BodyContainer">
                    <div class="adPosition" positioncode="BANNER_POSITION_TOP" style="" hasshare="True"
                         hasnotshare="False">
                        <div class="adshared">
                            <div class="aditem" time="15" style="display: block;"
                                 src="/imgs/20180407105303-7dfc.jpg"
                                 altsrc="/imgs/20180407105303-7dfc.jpg"
                                 link="#"
                                 bid="7550" tip="" tp="7" w="746" h="96" k=""><a
                                        href="{{env("APP_URL")}}/click.aspx?bannerid=7550" target="_blank"
                                        title="" rel="nofollow"><img
                                            src="/imgs/bdscompany_cover.png"
                                            style="max-width: 100%; height:96px;"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle-right">

            <div class="user_style">
                <div id="divUserStt" style="" ins-init-condition="#W29iamVjdCBPYmplY3Rd">
                    @if(!Auth::check())
                    <div>
                        <div class="header-middle-righ-link">
                            <a href="{{env("APP_URL")}}/login" rel="nofollow">Đăng nhập</a>
                        </div>
                        <div class="header-middle-righ-icon">
                            <img src="/imgs/login.png"
                                 id="ico_login">
                        </div>
                    </div>
                    <div>
                        <div class="header-middle-righ-link max90" id="kct_username">
                            <a href="{{env("APP_URL")}}/register" title="Đăng ký" rel="nofollow">Đăng ký
                            </a>
                        </div>
                        <div class="header-middle-righ-icon">
                            <img src="/imgs/register.png"
                                 id="ico_register">
                        </div>
                    </div>
                    @else
                    <div>
                        <div class="header-middle-righ-link"><a href="/logout" class="line_user_name" rel="nofollow">Thoát</a></div>
                        <div class="header-middle-righ-icon"><img
                                    src="https://file4.batdongsan.com.vn/images/ab/logout.png" id="ico_logout"
                                    style="padding-top: 2px !important"></div>
                    </div>
                    <div>
                        <div class="header-middle-righ-link max155 user_name"><img
                                    src="/imgs/user.png"
                                    style="display: block; float: left; margin-top: 7px; margin-right: 3px;"><a
                                    style="white-space: nowrap;" href="/thong-tin-ca-nhan" class="line_user_name"  rel="nofollow">{{Auth::user()->name}}</a>
                        </div>
                    </div>
                    @endif

                    <div class="header-middle-righ-link" id="chat-quick-inbox-icon"></div>
                </div>
                <div class="user_hide" style="display: none !important;">
                    <div class="header-middle-righ-link">
                        <a href="{{env("APP_URL")}}/Defaults/#" id="UserControl1_linkPostFAQ"><span
                                    class="HeaderText">Hỏi đáp</span></a>
                    </div>
                    <div class="header-middle-righ-icon">
                        <img src="/imgs/header-middle-right-icon2.jpg"
                             id="ico_faq">
                    </div>
                </div>
                <div id="divCusPostProduct">
                    <div id="UserControl1_divPostProduct" class="header-middle-righ-link">
                        <a href="/quan-ly-tin/dang-tin-ban-cho-thue"
                           id="linkPostProduct"><span>Đăng tin rao</span></a>
                    </div>
                    <div class="header-middle-righ-icon">
                        <img src="/imgs/plus.png"
                             id="ico_product">
                    </div>
                </div>
                <div id="UserControl1_divMember">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-menu">
    <div id="left-page-nav"></div>
    <div class="menupad"></div>
    <div id="page-navigative-menu">
        <div class="ihome"><a href="{{env("APP_URL")}}/"><img
                        src="/imgs/homea.png"></a></div>
        <ul class="dropdown-navigative-menu">
            <li class="lv0"><a href="{{env("APP_URL")}}/nha-dat-ban" class="haslink ">Nhà đất bán</a>
                <ul>
                    <li class="lv1"><a href="{{env("APP_URL")}}/ban-can-ho-chung-cu" class="haslink ">Bán
                            căn hộ chung cư</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/ban-nha-rieng" class="haslink ">Bán nhà
                            riêng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/ban-biet-thu-lien-ke"
                                       class="haslink ">Bán biệt thự, liền kề</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/ban-nha-mat-pho" class="haslink ">Bán nhà
                            mặt phố</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/ban-dat-nen-du-an" class="haslink ">Bán
                            đất nền dự án</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/ban-dat" class="haslink ">Bán đất</a>
                    </li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/ban-trang-trai-khu-nghi-duong"
                                       class="haslink ">Bán trang trại, khu nghỉ dưỡng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/ban-kho-nha-xuong" class="haslink ">Bán
                            kho, nhà xưởng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/ban-loai-bat-dong-san-khac"
                                       class="haslink ">Bán loại bất động sản khác</a></li>
                </ul>
            </li>
            <li class="lv0"><a href="{{env("APP_URL")}}/nha-dat-cho-thue" class="haslink ">Nhà đất cho
                    thuê</a>
                <ul>
                    <li class="lv1"><a href="{{env("APP_URL")}}/cho-thue-can-ho-chung-cu"
                                       class="haslink ">Cho thuê căn hộ chung cư</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/cho-thue-nha-rieng" class="haslink ">Cho
                            thuê nhà riêng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/cho-thue-nha-mat-pho" class="haslink ">Cho
                            thuê nhà mặt phố</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/cho-thue-nha-tro-phong-tro"
                                       class="haslink ">Cho thuê nhà trọ, phòng trọ</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/cho-thue-van-phong" class="haslink ">Cho
                            thuê văn phòng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/cho-thue-cua-hang-ki-ot"
                                       class="haslink ">Cho thuê cửa hàng - ki ốt</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/cho-thue-kho-nha-xuong-dat"
                                       class="haslink ">Cho thuê kho, nhà xưởng, đất</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/cho-thue-loai-bat-dong-san-khac"
                                       class="haslink ">Cho thuê loại bất động sản khác</a></li>
                </ul>
            </li>
            <li class="lv0"><a href="{{env("APP_URL")}}/nha-dat-can-mua" class="haslink">Nhà
                    đất cần mua</a>
                <ul>
                    <li class="lv1"><a href="{{env("APP_URL")}}/mua-can-ho-chung-cu"
                                       class="haslink ">Mua căn hộ chung cư</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/mua-nha-rieng" class="haslink ">Mua
                            nhà riêng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/mua-nha-biet-thu-lien-ke"
                                       class="haslink ">Mua nhà biệt thự, liền kề</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/mua-nha-mat-pho"
                                       class="haslink ">Mua nhà mặt phố</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/mua-dat-nen-du-an"
                                       class="haslink ">Mua đất nền dự án</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/mua-dat" class="haslink ">Mua
                            đất</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/mua-trang-trai-khu-nghi-duong"
                                       class="haslink ">Mua trang trại, khu nghỉ dưỡng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/mua-kho-nha-xuong"
                                       class="haslink ">Mua kho, nhà xưởng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/mua-cac-loai-bat-dong-san-khac"
                                       class="haslink ">Mua loại bất động sản khác</a></li>
                </ul>
            </li>
            <li class="lv0"><a href="{{env("APP_URL")}}/nha-dat-can-thue" class="haslink">Nhà
                    đất cần thuê</a>
                <ul>
                    <li class="lv1"><a href="{{env("APP_URL")}}/can-thue-can-ho-chung-cu"
                                       class="haslink ">Cần thuê căn hộ chung cư</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/can-thue-nha-rieng"
                                       class="haslink ">Cần thuê nhà riêng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/can-thue-nha-mat-pho"
                                       class="haslink ">Cần thuê nhà mặt phố</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/can-thue-nha-tro-phong-tro"
                                       class="haslink ">Cần thuê nhà trọ, phòng trọ</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/can-thue-van-phong"
                                       class="haslink ">Cần thuê văn phòng</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/can-thue-cua-hang-ki-ot"
                                       class="haslink ">Cần thuê cửa hàng - ki ốt</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/can-thue-kho-nha-xuong-dat"
                                       class="haslink ">Cần thuê kho, nhà xưởng, đất</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/can-thue-loai-bat-dong-san-khac"
                                       class="haslink ">Cần thuê loại bất động sản khác</a></li>
                </ul>
            </li>
            <li class="lv0"><a href="{{env("APP_URL")}}/tin-tuc" class="haslink ">Tin tức</a>
                <ul>
                    <li class="lv1"><a href="{{env("APP_URL")}}/tin-thi-truong" class="haslink ">Tin thị trường</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/phan-tich-nhan-dinh" class="haslink ">Phân tích - nhận định</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/bat-dong-san-the-gioi" class="haslink ">Bất
                            động sản thế giới</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/tai-chinh-chung-khoan-bat-dong-san"
                                       class="haslink ">Tài chính - Chứng khoán - BĐS</a></li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/tu-van-luat-bat-dong-san"
                                       class="haslink indent">Tư vấn luật</a>
                        <ul>
                            <li class="lv2"><a href="{{env("APP_URL")}}/trinh-tu-thu-tuc"
                                               class="haslink "> Trình tự, thủ tục</a></li>
                            <li class="lv2"><a href="{{env("APP_URL")}}/quyen-so-huu" class="haslink ">Quyền
                                    sở hữu</a></li>
                            <li class="lv2"><a href="{{env("APP_URL")}}/tranh-chap" class="haslink ">Tranh
                                    chấp</a></li>
                            <li class="lv2"><a href="{{env("APP_URL")}}/xay-dung-hoan-cong"
                                               class="haslink ">Xây dựng - Hoàn công</a></li>
                            <li class="lv2"><a href="{{env("APP_URL")}}/nghia-vu-tai-chinh"
                                               class="haslink ">Nghĩa vụ tài chính</a></li>
                            <li class="lv2"><a href="{{env("APP_URL")}}/cac-van-de-co-yeu-to-nuoc-ngoai"
                                               class="haslink ">Các vấn đề có yếu tố nước ngoài</a></li>
                        </ul>
                    </li>
                    <li class="lv1"><a href="{{env("APP_URL")}}/loi-khuyen" class="haslink indent">Lời
                            khuyên</a>
                        <ul>
                            <li class="lv2"><a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-mua"
                                               class="haslink ">Lời khuyên cho người mua</a></li>
                            <li class="lv2"><a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-ban"
                                               class="haslink ">Lời khuyên cho người bán</a></li>
                            <li class="lv2"><a href="{{env("APP_URL")}}/loi-khuyen-cho-nha-dau-tu"
                                               class="haslink ">Lời khuyên cho nhà đầu tư</a></li>
                            <li class="lv2"><a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-thue"
                                               class="haslink ">Lời khuyên cho người thuê</a></li>
                            <li class="lv2"><a href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-cho-thue"
                                               class="haslink ">Lời khuyên cho người cho thuê</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="lv0"><a href="{{env("APP_URL")}}/chinh-sach-quan-ly" class="haslink ">Chính sách - Quản lý</a></li>
            <li class="lv0"><a href="{{env("APP_URL")}}/thong-tin-quy-hoach" class="haslink ">Thông tin quy hoạch</a></li>
            <li class="lv0"><a href="{{env("APP_URL")}}/ho-tro" class="haslink ">Hỗ trợ</a></li>

        </ul>
    </div>
    <div class="menupad"></div>
    <div id="right-page-nav"></div>
</div>