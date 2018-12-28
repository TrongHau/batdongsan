<?php
use App\Library\Helpers;
?>
@extends('layouts.app')
@section('content')
    <div id="MiddleSubMenu">
        <div class="home-top-search" style="padding-bottom: 10px !important;">
            <div class="home-top-search-keyword">
                <input name="ctl00$ctl29$ctl00$txt1" type="text" value="" id="txt1" placeholder="Nhập từ khóa để tìm theo cụm từ" autocomplete="nope" class="txtKeyword">
            </div>
            <div class="advance-select-box" id="home-top-search">
<span class="select-text">
<span class="select-text-content" style="width: 100px;">Nhà đất bán</span>
</span>
                <input type="hidden" name="ctl00$ctl29$ctl00$cboTypeSearch" id="cboTypeSearch" value="1">
                <div id="home-top-search-otions" class="advance-select-options advance-options"
                     hddvalue="cboTypeSearch" ddlid="home-top-search" style="">
                    <ul class="advance-options" style="min-width: 125px;">
                        <li value="1" class="advance-options current" style="min-width: 93px;">Nhà đất bán</li>
                        <li value="2" class="advance-options" style="min-width: 93px;">Nhà đất cho thuê</li>
                        <li value="3" class="advance-options" style="min-width: 93px;">Tin tức</li>
                        <li value="4" class="advance-options" style="min-width: 93px;">Hỏi đáp</li>
                        <li value="5" class="advance-options" style="min-width: 93px;">Dự án</li>
                        <li value="6" class="advance-options" style="min-width: 93px;">Doanh nghiệp</li>
                        <li value="7" class="advance-options" style="min-width: 93px;">Môi giới</li>
                    </ul>
                </div>
            </div>
            <img src="/imgs/header-bottom-button.jpg"
                 onclick="Redirect();" class="fg-button fg-button-bg-default fg-button-toggleable ui-corner-all"
                 alt="Tìm kiếm">
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="div_2col">
        <div id="TopRightMainContent" class="col_cent">
            <div class="news-list-border-background">
                <ul class="news-list-thumb">
                    <li style="display: none;" id="li_0">
                        <a href="{{env("APP_URL")}}/tin-thi-truong/nha-o-thuong-hieu-se-la-mo-hinh-dau-tu-hot-bac-trong-tuong-lai-ar96977"
                           title="Nhà ở thương hiệu sẽ là mô hình đầu tư hốt bạc trong tương lai?">
                            <img class="imagethumbnail"
                                 alt="Nhà ở thương hiệu sẽ là mô hình đầu tư hốt bạc trong tương lai?"
                                 src="/imgs/20181215101927-803e.jpg"
                                 style="float:left;">
                        </a>
                        <div class="thumb-title">
                            <a href="{{env("APP_URL")}}/tin-thi-truong/nha-o-thuong-hieu-se-la-mo-hinh-dau-tu-hot-bac-trong-tuong-lai-ar96977"
                               title="Nhà ở thương hiệu sẽ là mô hình đầu tư hốt bạc trong tương lai?">Nhà ở thương
                                hiệu sẽ là mô hình đầu tư hốt bạc trong tương lai? </a>
                        </div>
                        <div class="thumb-summary">
                            Mô hình nhà ở có thương hiệu (branded residence) tuy không còn xa lạ với nhiều thị
                            trường bất động sản trên thế giới nhưng lại khá mới mẻ tại những thị trường đang phát
                            triển như Việt Nam. Ở Việt Nam, branded residence mới được biết đến và bó hẹp trong
                            định...
                        </div>
                    </li>
                    <li style="display: none;" id="li_1">
                        <a href="{{env("APP_URL")}}/phan-tich-nhan-dinh/doanh-nghiep-bat-dong-san-doi-mat-voi-thue-chong-thue-ar96976"
                           title="Doanh nghiệp bất động sản đối mặt với “thuế chồng thuế”">
                            <img class="imagethumbnail"
                                 alt="Doanh nghiệp bất động sản đối mặt với “thuế chồng thuế”"
                                 src="/imgs/20181215095256-8edd.jpg"
                                 style="float:left;">
                        </a>
                        <div class="thumb-title">
                            <a href="{{env("APP_URL")}}/phan-tich-nhan-dinh/doanh-nghiep-bat-dong-san-doi-mat-voi-thue-chong-thue-ar96976"
                               title="Doanh nghiệp bất động sản đối mặt với “thuế chồng thuế”">Doanh nghiệp bất động
                                sản đối mặt với “thuế chồng thuế” </a>
                        </div>
                        <div class="thumb-summary">
                            Nghị định 20/2017/NĐ-CP quy định về quản lý thuế đối với các doanh nghiệp có giao dịch
                            liên kết (gọi tắt là Nghị định 20) có hiệu lực từ 1/5/2017. Sau hơn một năm đi vào thực
                            tiễn, việc áp trần lãi thuế của Nghị định đang gây khó cho doanh nghiệp, đặc biệt là...
                        </div>
                    </li>
                    <li style="display: none;" id="li_2">
                        <a href="{{env("APP_URL")}}/tin-thi-truong/2019-se-la-khoi-dau-chu-ky-kho-khan-cua-bat-dong-san-ar96973"
                           title="2019 sẽ là khởi đầu chu kỳ khó khăn của bất động sản?">
                            <img class="imagethumbnail" alt="2019 sẽ là khởi đầu chu kỳ khó khăn của bất động sản?"
                                 src="/imgs/20181215103911-0e54.jpg"
                                 style="float:left;">
                        </a>
                        <div class="thumb-title">
                            <a href="{{env("APP_URL")}}/tin-thi-truong/2019-se-la-khoi-dau-chu-ky-kho-khan-cua-bat-dong-san-ar96973"
                               title="2019 sẽ là khởi đầu chu kỳ khó khăn của bất động sản?">2019 sẽ là khởi đầu chu
                                kỳ khó khăn của bất động sản? </a>
                        </div>
                        <div class="thumb-summary">
                            Các chuyên gia cho rằng, thị trường bất động sản trong năm 2018 đã bộc lộc một số "biến
                            cố". Sang năm 2019, thị trường có thể sẽ xuống sức, không còn thuận lợi như trước.
                        </div>
                    </li>
                    <li style="display: none;" id="li_3">
                        <a href="{{env("APP_URL")}}/tin-thi-truong/5-uu-diem-noi-bat-cua-new-times-city-ar96907"
                           title="5 ưu điểm nổi bật của New Times City">
                            <img class="imagethumbnail" alt="5 ưu điểm nổi bật của New Times City"
                                 src="/imgs/20181211162250-687c.jpg"
                                 style="float:left;">
                        </a>
                        <div class="thumb-title">
                            <a href="{{env("APP_URL")}}/tin-thi-truong/5-uu-diem-noi-bat-cua-new-times-city-ar96907"
                               title="5 ưu điểm nổi bật của New Times City">5 ưu điểm nổi bật của New Times
                                City </a>
                        </div>
                        <div class="thumb-summary">
                            Nằm ngay trung tâm thị xã Tân Uyên, tỉnh Bình Dương, hạ tầng hoàn chỉnh, sổ đỏ riêng
                            từng nền, giá mềm, ưu đãi hấp dẫn… là những ưu điểm giúp New Times City chinh phục khách
                            hàng. Dự án vừa được Công ty CP Địa ốc Kim Oanh giới thiệu ra thị trường khoảng 10...
                        </div>
                    </li>
                    <li style="display: none;" id="li_4">
                        <a href="{{env("APP_URL")}}/tin-thi-truong/can-ho-dien-tich-nho-dat-thanh-khoan-cao-tren-thi-truong-ar96957"
                           title="Căn hộ diện tích nhỏ đạt thanh khoản cao trên thị trường">
                            <img class="imagethumbnail"
                                 alt="Căn hộ diện tích nhỏ đạt thanh khoản cao trên thị trường"
                                 src="/imgs/20181214105528-7927.jpg"
                                 style="float:left;">
                        </a>
                        <div class="thumb-title">
                            <a href="{{env("APP_URL")}}/tin-thi-truong/can-ho-dien-tich-nho-dat-thanh-khoan-cao-tren-thi-truong-ar96957"
                               title="Căn hộ diện tích nhỏ đạt thanh khoản cao trên thị trường">Căn hộ diện tích nhỏ
                                đạt thanh khoản cao trên thị trường </a>
                        </div>
                        <div class="thumb-summary">
                            Nhận định và đánh giá về thị trường chung cư tại “Hội nghị Bất động sản Việt Nam 2018 -
                            Vietnam Real Estate Summit 2018” do Batdongsan.com.vn tổ chức ở Hà Nội, nhiều chuyên gia
                            cho biết căn hộ chung cư diện tích nhỏ đang ngày càng nhỏ hơn và phân khúc này...
                        </div>
                    </li>
                    <li style="display: block;" id="li_5">
                        <a href="{{env("APP_URL")}}/tin-thi-truong/chung-cu-van-se-la-san-pham-chu-dao-cua-thi-truong-nha-o-sai-gon-ar96956"
                           title="Chung cư vẫn sẽ là sản phẩm chủ đạo của thị trường nhà ở Sài Gòn">
                            <img class="imagethumbnail"
                                 alt="Chung cư vẫn sẽ là sản phẩm chủ đạo của thị trường nhà ở Sài Gòn"
                                 src="/imgs/20181214102620-b9c8.jpg"
                                 style="float:left;">
                        </a>
                        <div class="thumb-title">
                            <a href="{{env("APP_URL")}}/tin-thi-truong/chung-cu-van-se-la-san-pham-chu-dao-cua-thi-truong-nha-o-sai-gon-ar96956"
                               title="Chung cư vẫn sẽ là sản phẩm chủ đạo của thị trường nhà ở Sài Gòn">Chung cư vẫn
                                sẽ là sản phẩm chủ đạo của thị trường nhà ở Sài Gòn </a>
                        </div>
                        <div class="thumb-summary">
                            Năm 2018, phân khúc căn hộ chung cư chiếm thế thượng phong trong tổng sản phẩm nhà ở tại
                            các dự án bất động sản của Tp.HCM với tỷ lệ 94,2%.
                        </div>
                    </li>
                </ul>
                <div style="clear: both;">
                </div>
                <div class="news-slide-show-item">
                    <div class="news-list">
                        <ul>
                            <li>
                                <a href="{{env("APP_URL")}}/tin-thi-truong/2019-se-la-khoi-dau-chu-ky-kho-khan-cua-bat-dong-san-ar96973"
                                   title="2019 sẽ là khởi đầu chu kỳ khó khăn của bất động sản?" id="link_96973">2019
                                    sẽ là khởi đầu chu kỳ khó khăn của bất động sản?</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tin-thi-truong/5-uu-diem-noi-bat-cua-new-times-city-ar96907"
                                   title="5 ưu điểm nổi bật của New Times City" id="link_96907">5 ưu điểm nổi bật
                                    của New Times City</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tin-thi-truong/can-ho-dien-tich-nho-dat-thanh-khoan-cao-tren-thi-truong-ar96957"
                                   title="Căn hộ diện tích nhỏ đạt thanh khoản cao trên thị trường" id="link_96957">Căn
                                    hộ diện tích nhỏ đạt thanh khoản cao trên thị trường</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tin-thi-truong/chung-cu-van-se-la-san-pham-chu-dao-cua-thi-truong-nha-o-sai-gon-ar96956"
                                   title="Chung cư vẫn sẽ là sản phẩm chủ đạo của thị trường nhà ở Sài Gòn"
                                   id="link_96956">Chung cư vẫn sẽ là sản phẩm chủ đạo của thị trường nhà ở Sài
                                    Gòn</a>
                            </li>
                            <li >
                                <a href="{{env("APP_URL")}}/tin-thi-truong/nha-o-thuong-hieu-se-la-mo-hinh-dau-tu-hot-bac-trong-tuong-lai-ar96977"
                                   title="Nhà ở thương hiệu sẽ là mô hình đầu tư hốt bạc trong tương lai?"
                                   id="link_96977">Nhà ở thương hiệu sẽ là mô hình đầu tư hốt bạc trong tương
                                    lai?</a>
                            </li>
                            <li >
                                <a href="{{env("APP_URL")}}/phan-tich-nhan-dinh/doanh-nghiep-bat-dong-san-doi-mat-voi-thue-chong-thue-ar96976"
                                   title="Doanh nghiệp bất động sản đối mặt với “thuế chồng thuế”" id="link_96976">Doanh
                                    nghiệp bất động sản đối mặt với “thuế chồng thuế”</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tin-thi-truong/2019-se-la-khoi-dau-chu-ky-kho-khan-cua-bat-dong-san-ar96973"
                                   title="2019 sẽ là khởi đầu chu kỳ khó khăn của bất động sản?" id="link_96973">2019
                                    sẽ là khởi đầu chu kỳ khó khăn của bất động sản?</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tin-thi-truong/5-uu-diem-noi-bat-cua-new-times-city-ar96907"
                                   title="5 ưu điểm nổi bật của New Times City" id="link_96907">5 ưu điểm nổi bật
                                    của New Times City</a>
                            </li>
                            <li class="li_4" >
                                <a href="{{env("APP_URL")}}/tin-thi-truong/can-ho-dien-tich-nho-dat-thanh-khoan-cao-tren-thi-truong-ar96957"
                                   title="Căn hộ diện tích nhỏ đạt thanh khoản cao trên thị trường" id="link_96957">Căn
                                    hộ diện tích nhỏ đạt thanh khoản cao trên thị trường</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tin-thi-truong/chung-cu-van-se-la-san-pham-chu-dao-cua-thi-truong-nha-o-sai-gon-ar96956"
                                   title="Chung cư vẫn sẽ là sản phẩm chủ đạo của thị trường nhà ở Sài Gòn"
                                   id="link_96956">Chung cư vẫn sẽ là sản phẩm chủ đạo của thị trường nhà ở Sài
                                    Gòn</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tin-thi-truong/nha-o-thuong-hieu-se-la-mo-hinh-dau-tu-hot-bac-trong-tuong-lai-ar96977"
                                   title="Nhà ở thương hiệu sẽ là mô hình đầu tư hốt bạc trong tương lai?"
                                   id="link_96977">Nhà ở thương hiệu sẽ là mô hình đầu tư hốt bạc trong tương
                                    lai?</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <script type="text/javascript">
            $(function () {
                var i = 0;
                var len = 5;
                var first = true;
                var o = $(".news-list").jCarouselLite({
                    vertical: true,
                    hoverPause: false,
                    visible: 5,
                    start: 1,
                    warp: "circle",
                    auto: 1,
                    speed: 1000,
                    beforeStart: function (a) {
                        if (!first)
                            $(a).parent().delay(1000);
                    },
                    afterEnd: function (a) {
                        if (first) {
                            first = false;
                        }
                        $(".news-list-thumb > li").css("display", "none");
                        $("#li_" + (len - i)).css("display", "block");
                        i++;
                        if (i > len) i = 0;
                        $(a).parent().delay(6500);
                    }
                });
            });
        </script>
        <div id="MiddleBanner">
            <div class="adPosition" positioncode="BANNER_POSITION_HORIZONTAL_MAIN_CONTENT" style="" hasshare="True"
                 hasnotshare="True">
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="t_left">
            <div id="MiddleLeftMainContent">
                <div>
                    <div id="ctl31_HeaderContainer" class="tit_l">
                        <h2><a><span style="white-space:nowrap;">Tin rao dành cho bạn</span></a></h2>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="line_gr"></div>
                    <div id="ctl31_BodyContainer">
                        <div class="product-list tin-danh-cho-ban">
                            <div class="vip5" rel="14698775">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-nha-rieng-duong-dang-thai-mai-phuong-quang-an-2/mat-ngo-ven-ho-view-ho-tay-o-va-kinh-doanh-hieu-qua-pr14698775"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/no-photo.jpg"
                                                 alt="Bán nhà mặt ngõ ven hồ, view Hồ Tây, ở và kinh doanh hiệu quả">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_0"
                                                   title="Bán nhà mặt ngõ ven hồ, view Hồ Tây, ở và kinh doanh hiệu quả"
                                                   href="{{env("APP_URL")}}/ban-nha-rieng-duong-dang-thai-mai-phuong-quang-an-2/mat-ngo-ven-ho-view-ho-tay-o-va-kinh-doanh-hieu-qua-pr14698775">Bán
                                                    nhà mặt ngõ ven hồ, view Hồ Tây, ở và kinh doanh hiệu quả</a></h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;23 tỷ
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;150 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-nha-rieng-tay-ho"
                                                              title="Bán nhà riêng tại Tây Hồ">Tây Hồ</a>, <a
                                                            class="link_blue"
                                                            href="{{env("APP_URL")}}/ban-nha-rieng-ha-noi"
                                                            title="Bán nhà riêng tại Hà Nội">Hà Nội</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="vip5" rel="18308114">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-dat-duong-21a-xa-hoa-thach/chinh-chu-gia-dinh-can-3560m2-tai-thon-thang-dau-lh-chinh-chu-0966331159-pr18308114"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/crop120x90.20181104104647920.jpg"
                                                 alt="Chính chủ gia đình cần bán 3560m2 đất tại thôn Thắng Đầu, xã Hòa Thạch, LH: Chính chủ 0966331159">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_1"
                                                   title="Chính chủ gia đình cần bán 3560m2 đất tại thôn Thắng Đầu, xã Hòa Thạch, LH: Chính chủ 0966331159"
                                                   href="{{env("APP_URL")}}/ban-dat-duong-21a-xa-hoa-thach/chinh-chu-gia-dinh-can-3560m2-tai-thon-thang-dau-lh-chinh-chu-0966331159-pr18308114">Chính
                                                    chủ gia đình cần bán 3560m2 đất tại thôn Thắng Đầu, xã Hòa Thạch,
                                                    LH: Chính chủ 0966331159</a></h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;Thỏa thuận
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;3560 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-dat-quoc-oai"
                                                              title="Bán đất tại Quốc Oai">Quốc Oai</a>, <a
                                                            class="link_blue"
                                                            href="{{env("APP_URL")}}/ban-dat-ha-noi"
                                                            title="Bán đất tại Hà Nội">Hà Nội</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="vip5" rel="18534833">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-dat-duong-dai-lo-hoa-binh-xa-yen-quang-2/chinh-chu-can-6-ha-tai-hu-ky-son-lh-0914-813-665-0966-331159-pr18534833"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/crop120x90.20181120152250805.jpg"
                                                 alt="Chính chủ cần bán 6 ha đất tại xã Yên Quang, huyện Kỳ Sơn. LH: 0914.813.665 - 0966.331159">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_2"
                                                   title="Chính chủ cần bán 6 ha đất tại xã Yên Quang, huyện Kỳ Sơn. LH: 0914.813.665 - 0966.331159"
                                                   href="{{env("APP_URL")}}/ban-dat-duong-dai-lo-hoa-binh-xa-yen-quang-2/chinh-chu-can-6-ha-tai-hu-ky-son-lh-0914-813-665-0966-331159-pr18534833">Chính
                                                    chủ cần bán 6 ha đất tại xã Yên Quang, huyện Kỳ Sơn. LH:
                                                    0914.813.665 - 0966.331159</a></h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;Thỏa thuận
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;60000 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-dat-ky-son-hb"
                                                              title="Bán đất tại Kỳ Sơn">Kỳ Sơn</a>, <a
                                                            class="link_blue"
                                                            href="{{env("APP_URL")}}/ban-dat-hoa-binh"
                                                            title="Bán đất tại Hòa Bình">Hòa Bình</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="vip5" rel="18520714">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-dat-duong-dai-lo-hoa-binh-xa-yen-quang-2/chinh-chu-gia-dinh-can-huyen-ky-son-lh-0966331159-sinh-a-nien-0914813665-pr18520714"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/crop120x90.20181119154238134.jpg"
                                                 alt="Chính chủ gia đình cần bán lô đất huyện Kỳ Sơn, Hòa Bình. LH 0966331159 Sinh, A. Niên 0914813665">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_3"
                                                   title="Chính chủ gia đình cần bán lô đất huyện Kỳ Sơn, Hòa Bình. LH 0966331159 Sinh, A. Niên 0914813665"
                                                   href="{{env("APP_URL")}}/ban-dat-duong-dai-lo-hoa-binh-xa-yen-quang-2/chinh-chu-gia-dinh-can-huyen-ky-son-lh-0966331159-sinh-a-nien-0914813665-pr18520714">Chính
                                                    chủ gia đình cần bán lô đất huyện Kỳ Sơn, Hòa Bình. LH 0966331159
                                                    Sinh, A. Niên 0914813665</a></h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;Thỏa thuận
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;7672 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-dat-ky-son-hb"
                                                              title="Bán đất tại Kỳ Sơn">Kỳ Sơn</a>, <a
                                                            class="link_blue"
                                                            href="{{env("APP_URL")}}/ban-dat-hoa-binh"
                                                            title="Bán đất tại Hòa Bình">Hòa Bình</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="vip5" rel="18284690">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-dat-xa-tien-xuan/can-tho-cu-lam-kho-xuong-3800m2-thach-that-lien-he-0966331159-pr18284690"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/crop120x90.20181102100641387.jpg"
                                                 alt="Cần bán đất thổ cư làm kho xưởng 3800m2, xã Tiến Xuân, Thạch Thất. Liên hệ: 0966331159">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_4"
                                                   title="Cần bán đất thổ cư làm kho xưởng 3800m2, xã Tiến Xuân, Thạch Thất. Liên hệ: 0966331159"
                                                   href="{{env("APP_URL")}}/ban-dat-xa-tien-xuan/can-tho-cu-lam-kho-xuong-3800m2-thach-that-lien-he-0966331159-pr18284690">Cần
                                                    bán đất thổ cư làm kho xưởng 3800m2, xã Tiến Xuân, Thạch Thất. Liên
                                                    hệ: 0966331159</a></h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;5 tỷ
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;3800 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-dat-thach-that"
                                                              title="Bán đất tại Thạch Thất">Thạch Thất</a>, <a
                                                            class="link_blue"
                                                            href="{{env("APP_URL")}}/ban-dat-ha-noi"
                                                            title="Bán đất tại Hà Nội">Hà Nội</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="vip5" rel="16214078">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-nha-mat-pho-duong-nguyen-thi-chay-phuong-tan-dong-hiep/chinh-chu-tien-kinh-doanh-buon-ok-cach-cho-100m-pr16214078"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/20180730084822-8359_wm.jpg"
                                                 alt="Chính chủ bán nhà mặt tiền đường Nguyễn Thị Chạy kinh doanh buôn bán ok, cách chợ 100m">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_5"
                                                   title="Chính chủ bán nhà mặt tiền đường Nguyễn Thị Chạy kinh doanh buôn bán ok, cách chợ 100m"
                                                   href="{{env("APP_URL")}}/ban-nha-mat-pho-duong-nguyen-thi-chay-phuong-tan-dong-hiep/chinh-chu-tien-kinh-doanh-buon-ok-cach-cho-100m-pr16214078">Chính
                                                    chủ bán nhà mặt tiền đường Nguyễn Thị Chạy kinh doanh buôn bán ok,
                                                    cách chợ 100m</a></h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;2.2 tỷ
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;62 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-nha-mat-pho-di-an-bd"
                                                              title="Bán nhà mặt phố tại Dĩ An">Dĩ An</a>, <a
                                                            class="link_blue"
                                                            href="{{env("APP_URL")}}/ban-nha-mat-pho-binh-duong"
                                                            title="Bán nhà mặt phố tại Bình Dương">Bình Dương</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="vip5" rel="18223590">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-dat-nen-du-an-duong-21a-xa-hoa-thach-prj-khu-do-thi-tay-quoc-oai/chinh-chu-can-lo-4000m2-mat-lien-he-0966331159-pr18223590"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/crop120x90.20181029145819933.jpg"
                                                 alt="Chính chủ cần bán lô đất 4000m2, đất mặt đường, liên hệ 0966331159">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_6"
                                                   title="Chính chủ cần bán lô đất 4000m2, đất mặt đường, liên hệ 0966331159"
                                                   href="{{env("APP_URL")}}/ban-dat-nen-du-an-duong-21a-xa-hoa-thach-prj-khu-do-thi-tay-quoc-oai/chinh-chu-can-lo-4000m2-mat-lien-he-0966331159-pr18223590">Chính
                                                    chủ cần bán lô đất 4000m2, đất mặt đường, liên hệ 0966331159</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;Thỏa thuận
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;4000 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-dat-nen-du-an-quoc-oai"
                                                              title="Bán đất nền dự án tại Quốc Oai">Quốc Oai</a>,
                                                    <a class="link_blue"
                                                       href="{{env("APP_URL")}}/ban-dat-nen-du-an-ha-noi"
                                                       title="Bán đất nền dự án tại Hà Nội">Hà Nội</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="vip5" rel="18307846">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-dat-duong-dai-lo-hoa-binh-xa-yen-quang-2/can-gap-3-5-ha-tai-lh-0966-331159-0914-813-665-pr18307846"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/crop120x90.20181104100446786.jpg"
                                                 alt="Cần bán gấp lô đất 3,5 ha đất tại xã Yên Quang. Lh:0966.331159 - 0914.813.665">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_7"
                                                   title="Cần bán gấp lô đất 3,5 ha đất tại xã Yên Quang. Lh:0966.331159 - 0914.813.665"
                                                   href="{{env("APP_URL")}}/ban-dat-duong-dai-lo-hoa-binh-xa-yen-quang-2/can-gap-3-5-ha-tai-lh-0966-331159-0914-813-665-pr18307846">Cần
                                                    bán gấp lô đất 3,5 ha đất tại xã Yên Quang. Lh:0966.331159 -
                                                    0914.813.665</a></h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;Thỏa thuận
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;35000 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-dat-ky-son-hb"
                                                              title="Bán đất tại Kỳ Sơn">Kỳ Sơn</a>, <a
                                                            class="link_blue"
                                                            href="{{env("APP_URL")}}/ban-dat-hoa-binh"
                                                            title="Bán đất tại Hòa Bình">Hòa Bình</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="vip5" rel="18235543">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-dat-duong-21a-xa-hoa-thach/chinh-chu-can-lo-1200m2-tho-cu-tai-thon-truc-lhcc-0966331159-pr18235543"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/no-photo.jpg"
                                                 alt="Chính chủ cần bán lô đất 1200m2 đất thổ cư tại thôn Hòa Trúc, xã Hòa Thạch. LHCC 0966331159">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_8"
                                                   title="Chính chủ cần bán lô đất 1200m2 đất thổ cư tại thôn Hòa Trúc, xã Hòa Thạch. LHCC 0966331159"
                                                   href="{{env("APP_URL")}}/ban-dat-duong-21a-xa-hoa-thach/chinh-chu-can-lo-1200m2-tho-cu-tai-thon-truc-lhcc-0966331159-pr18235543">Chính
                                                    chủ cần bán lô đất 1200m2 đất thổ cư tại thôn Hòa Trúc, xã Hòa
                                                    Thạch. LHCC 0966331159</a></h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;Thỏa thuận
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;1200 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-dat-quoc-oai"
                                                              title="Bán đất tại Quốc Oai">Quốc Oai</a>, <a
                                                            class="link_blue"
                                                            href="{{env("APP_URL")}}/ban-dat-ha-noi"
                                                            title="Bán đất tại Hà Nội">Hà Nội</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="vip5" rel="18194249">
                                <div class="p-main">
                                    <div class="p-main-image-crop">
                                        <a class="product-avatar"
                                           href="{{env("APP_URL")}}/ban-dat-duong-hoa-phuc-xa-hoa-thach/chinh-chu-can-lo-ngay-mat-ho-thon-quoc-oai-0966331159-pr18194249"
                                           onclick="">
                                            <img class="product-avatar-img"
                                                 src="/imgs/no-photo.jpg"
                                                 alt="Chính chủ cần bán lô đất ngay mặt hồ thôn Hòa Phúc, Quốc Oai, 0966331159">
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <div class="p-title">
                                            <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_9"
                                                   title="Chính chủ cần bán lô đất ngay mặt hồ thôn Hòa Phúc, Quốc Oai, 0966331159"
                                                   href="{{env("APP_URL")}}/ban-dat-duong-hoa-phuc-xa-hoa-thach/chinh-chu-can-lo-ngay-mat-ho-thon-quoc-oai-0966331159-pr18194249">Chính
                                                    chủ cần bán lô đất ngay mặt hồ thôn Hòa Phúc, Quốc Oai,
                                                    0966331159</a></h3>
                                        </div>
                                    </div>
                                    <div class="p-bottom-crop">
                                        <div class="p-bottom-left">
                                            <div>
                                                <div class="left">Giá</div>
                                                :&nbsp;Thỏa thuận
                                            </div>
                                            <div>
                                                <div class="left">Diện tích</div>
                                                :&nbsp;500 m²
                                            </div>
                                            <div>
                                                <div class="fleft">
                                                    <div class="left">Quận/huyện</div>
                                                    :&nbsp;<a class="link_blue"
                                                              href="{{env("APP_URL")}}/ban-dat-quoc-oai"
                                                              title="Bán đất tại Quốc Oai">Quốc Oai</a>, <a
                                                            class="link_blue"
                                                            href="{{env("APP_URL")}}/ban-dat-ha-noi"
                                                            title="Bán đất tại Hà Nội">Hà Nội</a>
                                                </div>
                                                <div class="p-bottom-right font09">15/12/2018</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="otherlink"><a
                                        href="{{env("APP_URL")}}/ban-dat-duong-hoa-phuc-xa-hoa-thach"
                                        class="link_sr" style="text-decoration: none">Xem tin trang kế tiếp</a></div>
                        </div>
                        <div style="margin: 5px 0;">
                            <div style="float: left">
                                Tin Nhà đất bán mới nhất:
                                <span id="ctl31_ctl00_lbLinkNewProductForSell"><a
                                            href="{{env("APP_URL")}}/nha-dat-ban" class="link_blue">1</a>, <a
                                            href="{{env("APP_URL")}}/nha-dat-ban/p2" class="link_blue">2</a>, <a
                                            href="{{env("APP_URL")}}/nha-dat-ban/p3" class="link_blue">3</a>, <a
                                            href="{{env("APP_URL")}}/nha-dat-ban/p4" class="link_blue">4</a>, <a
                                            href="{{env("APP_URL")}}/nha-dat-ban/p5"
                                            class="link_blue">5</a></span>...
                            </div>
                            <div style="float: right">
                                Tin Nhà đất cho thuê mới nhất:
                                <span id="ctl31_ctl00_lbLinkNewProductForRent"><a
                                            href="{{env("APP_URL")}}/nha-dat-cho-thue"
                                            class="link_blue">1</a>, <a
                                            href="{{env("APP_URL")}}/nha-dat-cho-thue/p2" class="link_blue">2</a>, <a
                                            href="{{env("APP_URL")}}/nha-dat-cho-thue/p3" class="link_blue">3</a>, <a
                                            href="{{env("APP_URL")}}/nha-dat-cho-thue/p4" class="link_blue">4</a>, <a
                                            href="{{env("APP_URL")}}/nha-dat-cho-thue/p5" class="link_blue">5</a></span>...
                            </div>
                            <div class="clear">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear:both;margin-bottom:5px;"></div>
                <div class="adPosition" positioncode="BANNER_POSITION_HORIZONTAL_BELOW_MAIN_CONTENT" style=""
                     hasshare="True" hasnotshare="True"></div>
                <div style="clear:both;"></div>
                <div class="container-default">
                    <div id="ctl35_BodyContainer">
                        <h2 class="colorblue normal">Tin tức lĩnh vực nhà đất mới nhất</h2>
                        <div class="t_left-baiviet">
                            <div class="t_left-baiviet-header">
                                <div class="t_left-baiviet-header-left">
                                    <div>
                                        <div class="t_left-baiviet-header-left-1">
                                        </div>
                                        <div class="t_left-baiviet-header-left-repeat">
                                            <h3>
                                                <span id="ctl35_ctl00_Label1">Bài viết mới</span></h3>
                                        </div>
                                        <div class="t_left-baiviet-header-left-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="t_left-baiviet-header-right">
                                    <div class="t_left-baiviet-header-right-link" style="border: none;">
                                        <h3><a href="{{env("APP_URL")}}/tu-van-luat-bat-dong-san"
                                               title="Tư vấn luật" style="font-size: 11px;">
                                                Tư vấn luật</a></h3>
                                    </div>
                                    <div class="t_left-baiviet-header-right-link">
                                        <h3><a href="{{env("APP_URL")}}/xay-dung/" title="Xây dựng"
                                               style="font-size: 11px;">
                                                Xây dựng</a></h3>
                                    </div>
                                    <div class="t_left-baiviet-header-right-link">
                                        <h3><a href="{{env("APP_URL")}}/kien-truc/" title="Kiến trúc"
                                               style="font-size: 11px;">
                                                Kiến trúc</a></h3>
                                    </div>
                                    <div class="t_left-baiviet-header-right-link">
                                        <h3><a href="{{env("APP_URL")}}/noi-ngoai-that/"
                                               title="Nội - Ngoại thất" style="font-size: 11px;">
                                                Nội - Ngoại thất</a></h3>
                                    </div>
                                    <div class="t_left-baiviet-header-right-link">
                                        <h3><a href="{{env("APP_URL")}}/phong-thuy/" title="Phong thủy"
                                               style="font-size: 11px;">
                                                Phong thủy</a></h3>
                                    </div>
                                    <div class="clear">
                                    </div>
                                </div>
                            </div>
                            <div class="line-home">
                            </div>
                            <div class="t_left-baiviet-content">
                                <div class="group-news-border-backgroup">
                                    <a href="{{env("APP_URL")}}/biet-thu/tham-ngoi-nha-3-tang-tai-ha-noi-cua-hlv-park-hang-seo-ar96974">
                                        <img style="border: 1px solid #ccc;"
                                             src="/imgs/20181215105007-eafd.jpg"
                                             alt="Thăm ngôi nhà 3 tầng tại Hà Nội của HLV Park Hang-seo">
                                    </a>
                                    <div class="group-news-title">
                                        <h4>
                                            <a href="{{env("APP_URL")}}/biet-thu/tham-ngoi-nha-3-tang-tai-ha-noi-cua-hlv-park-hang-seo-ar96974"
                                               title="Thăm ngôi nhà 3 tầng tại Hà Nội của HLV Park Hang-seo">
                                                Thăm ngôi nhà 3 tầng tại Hà Nội của HLV Park Hang-seo<img
                                                        class="news-image-video-icon" atl=""
                                                        src="/imgs/bds-video.png">
                                            </a></h4>
                                    </div>
                                    <div class="group-news-summary">Trong một chương trình thực tế Hàn Quốc mới đây,
                                        HLV đội tuyển Việt Nam Park Hang-seo đã dẫn các đồng hương của mình ghé thăm
                                        biệt thự 3 tầng trong khu nhà chuyên gia ở...
                                    </div>
                                </div>
                                <div class="group-news-border-backgroup">
                                    <a href="{{env("APP_URL")}}/nha-dep/me-man-ngoi-nha-co-to-hop-an-choi-cuc-sanh-dieu-tren-san-thuong-ar96961">
                                        <img style="border: 1px solid #ccc;"
                                             src="/imgs/20181214112828-845f.jpg"
                                             alt="Mê mẩn ngôi nhà có &quot;tổ hợp ăn chơi&quot; cực sành điệu trên sân thượng">
                                    </a>
                                    <div class="group-news-title">
                                        <h4>
                                            <a href="{{env("APP_URL")}}/nha-dep/me-man-ngoi-nha-co-to-hop-an-choi-cuc-sanh-dieu-tren-san-thuong-ar96961"
                                               title="Mê mẩn ngôi nhà có &quot;tổ hợp ăn chơi&quot; cực sành điệu trên sân thượng">
                                                Mê mẩn ngôi nhà có "tổ hợp ăn chơi" cực sành điệu trên sân thượng
                                            </a></h4>
                                    </div>
                                    <div class="group-news-summary">Tầng thượng của ngôi nhà này sở hữu tất cả những
                                        gì mà người trẻ mơ ước để vui chơi, giải trí ngay tại nhà như bếp nướng
                                        ngoài trời, bàn ăn tiện nghi, thậm...
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="group-news-border-backgroup">
                                    <a href="{{env("APP_URL")}}/cac-van-de-co-yeu-to-nuoc-ngoai/co-so-nao-de-xac-dinh-cong-ty-bat-dong-san-co-von-nuoc-ngoai-ar96960">
                                        <img style="border: 1px solid #ccc;"
                                             src="/imgs/20181214144232-63a1.jpg"
                                             alt="Cơ sở nào để xác định công ty bất động sản có vốn nước ngoài?">
                                    </a>
                                    <div class="group-news-title">
                                        <h4>
                                            <a href="{{env("APP_URL")}}/cac-van-de-co-yeu-to-nuoc-ngoai/co-so-nao-de-xac-dinh-cong-ty-bat-dong-san-co-von-nuoc-ngoai-ar96960"
                                               title="Cơ sở nào để xác định công ty bất động sản có vốn nước ngoài?">
                                                Cơ sở nào để xác định công ty bất động sản có vốn nước ngoài?
                                            </a></h4>
                                    </div>
                                    <div class="group-news-summary">Hỏi: Tôi đang thực hiện một dự án đầu tư kinh
                                        doanh bất động sản trong lĩnh vực nhà ở thương mại và căn hộ chung cư cao
                                        cấp tại TP. Đà Nẵng. Để thực hiện, tôi sẽ...
                                    </div>
                                </div>
                                <div class="group-news-border-backgroup">
                                    <a href="{{env("APP_URL")}}/trinh-tu-thu-tuc/co-phai-lam-thu-tuc-tach-thua-voi-dat-o-co-vuon-ao-ar96959">
                                        <img style="border: 1px solid #ccc;"
                                             src="/imgs/20181214142900-3a78.jpg"
                                             alt="Có phải làm thủ tục tách thửa với đất ở có vườn ao?">
                                    </a>
                                    <div class="group-news-title">
                                        <h4>
                                            <a href="{{env("APP_URL")}}/trinh-tu-thu-tuc/co-phai-lam-thu-tuc-tach-thua-voi-dat-o-co-vuon-ao-ar96959"
                                               title="Có phải làm thủ tục tách thửa với đất ở có vườn ao?">
                                                Có phải làm thủ tục tách thửa với đất ở có vườn ao?
                                            </a></h4>
                                    </div>
                                    <div class="group-news-summary">Hỏi: Năm 2005, tôi có mua 635 m2 đất trồng cây
                                        lâu năm, trong đó có 100 m2 đã được chuyển sang đất ở để xây nhà. Phần diện
                                        tích đất còn lại tôi làm vườn trồng cây lâu năm,...
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div style="clear: both">
                                </div>
                                <div class="art-latest">
                                    <div class="art-item">
                                        <ul>
                                            <li>
                                                <a href="{{env("APP_URL")}}/nha-dep/ngam-ngoi-nha-2-tang-tien-nghi-duoc-lam-tu-kho-thoc-cu-bo-di-ar96949"
                                                   title="Ngắm ngôi nhà 2 tầng tiện nghi được làm từ kho thóc cũ bỏ đi">
                                                    Ngắm ngôi nhà 2 tầng tiện nghi được làm từ kho thóc cũ bỏ đi</a>
                                            </li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/the-gioi-kien-truc/trung-quoc-toa-nha-duoc-thiet-ke-giong-het-chiec-may-ghi-am-co-ar96946"
                                                   title="Trung Quốc: Tòa nhà được thiết kế giống hệt chiếc máy ghi âm cổ">
                                                    Trung Quốc: Tòa nhà được thiết kế giống hệt chiếc máy ghi âm
                                                    cổ</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/phong-tre-em/10-mau-phong-ngu-danh-cho-cac-cap-song-sinh-dep-tung-goc-nho-ar96894"
                                                   title="10 mẫu phòng ngủ dành cho các cặp song sinh đẹp từng góc nhỏ">
                                                    10 mẫu phòng ngủ dành cho các cặp song sinh đẹp từng góc nhỏ</a>
                                            </li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/toan-canh-ngoi-nha/can-ho-dep-va-binh-yen-nhu-khu-vuon-cua-co-gai-tre-ar96895"
                                                   title="Căn hộ đẹp và bình yên như &quot;khu vườn&quot; của cô gái trẻ">
                                                    Căn hộ đẹp và bình yên như "khu vườn" của cô gái trẻ</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/kien-thuc-xay-dung/nhieu-nguoi-nguy-hiem-tinh-mang-vi-nha-vuong-chuong-cop-ar96929"
                                                   title="Nhiều người nguy hiểm tính mạng vì nhà vướng chuồng cọp">
                                                    Nhiều người nguy hiểm tính mạng vì nhà vướng chuồng cọp</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/nha-pho/ve-ngoai-khac-la-cua-ngoi-nha-o-quan-hoang-mai-ha-noi-ar96925"
                                                   title="Vẻ ngoài khác lạ của ngôi nhà ở quận Hoàng Mai (Hà Nội)">
                                                    Vẻ ngoài khác lạ của ngôi nhà ở quận Hoàng Mai (Hà Nội)</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-commom">
                    <div id="ctl43_HeaderContainer" class="box-header">
                        <div class="name_tit" align="center">
                            <h2 style="color: White;">
                                Tìm kiếm tiêu biểu theo từ khóa</h2>
                        </div>
                    </div>
                    <div id="ctl43_BodyContainer" class="bor_box">
                        <div class="html-content">
                            <div style="width:558px">
                                <div class="tag-list ">
                                    <div class="fleft tag-list-pad width255">
                                        <ul>
                                            <li>
                                                <a href="{{env("APP_URL")}}/ban-nha-mat-pho-quan-12"
                                                   title="Bán nhà Quận 12">Bán nhà Quận 12</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/ban-nha-rieng-quan-4"
                                                   title="Bán nhà Quận 4">Bán nhà Quận 4</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/ban-nha-rieng-quan-7"
                                                   title="Bán nhà Quận 7">Bán nhà Quận 7</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/ban-nha-rieng-quan-8"
                                                   title="Bán nhà Quận 8">Bán nhà Quận 8</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/nha-dat-ban-binh-thanh"
                                                   title="Bán nhà Bình Thạnh">Bán nhà Bình Thạnh</a></li>
                                        </ul>
                                    </div>
                                    <div class="fleft width255">
                                        <ul>
                                            <li>
                                                <a href="{{env("APP_URL")}}/nha-dat-ban-go-vap"
                                                   title="Bán nhà Gò Vấp">Bán nhà Gò Vấp</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/nha-dat-ban-nha-be"
                                                   title="Bán nhà Nhà Bè">Bán nhà Nhà Bè</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/ban-nha-mat-pho-tan-phu"
                                                   title="Bán nhà Tân Phú">Bán nhà Tân Phú</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/ban-nha-mat-pho-quan-10"
                                                   title="Bán nhà Quận 10">Bán nhà Quận 10</a></li>
                                            <li>
                                                <a href="{{env("APP_URL")}}/ban-nha-mat-pho-quan-11"
                                                   title="Bán nhà Quận 11">Bán nhà Quận 11</a></li>
                                        </ul>
                                    </div>
                                    <div class="clear">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ctl43_FooterContainer">
                    </div>
                </div>
                <div style="clear: both; margin-bottom: 10px;">
                </div>
                <div class="adPosition" positioncode="BANNER_POSITION_HORIZONTAL_BELOW_MAIN_CONTENT_2" style=""
                     hasshare="True" hasnotshare="True"></div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div id="MainRight" class="col_right">
        <div id="TopLeftMainContent" class="col_left">
            <div class="home-search-box">
                <div class="tops">
                    <hTopLeftMainContent2>Công cụ tìm kiếm</hTopLeftMainContent2>
                </div>
                <div class="contents">
                    <div id="divOfSeach">
                        <div class="home-product-search">
                            <div id="searchArea">
                                <div class="comboboxs">
                                    <div class="newicon"
                                         style="width: 195px; padding-left: 5px; border: 1px solid #ccc;">
                                        <input type="text" id="txtAutoComplete"
                                               placeholder="Nhập địa điểm, vd: Sunrise City"
                                               style="position: relative; border: 0; width: 170px;"
                                               autocomplete="nope" class="ui-autocomplete-input" role="textbox"
                                               aria-autocomplete="list" aria-haspopup="true">
                                    </div>
                                    <div class="suggestTT" style="display: none;">
                                        <div class="arr">
                                            <img src="/imgs/greyarrow.png">
                                        </div>
                                        <div class="greencolor goiy"><strong>Gợi ý</strong></div>
                                        <ul>
                                            <li>Nhập tên tỉnh/thành phố, quận/huyện, phường/xã, đường/phố, dự án; ví
                                                dụ: Sunrise City
                                            </li>
                                            <li>Phải chọn các gợi ý chúng tôi đề xuất bên dưới để kết quả chính
                                                xác
                                            </li>
                                            <li>Nếu không nhập địa điểm ở đây, Quý vị có thể chọn lựa khu vực bằng
                                                các ô phía dưới trong công cụ tìm kiếm này
                                            </li>
                                        </ul>
                                        <div class="closeTT">
                                            <img src="/imgs/close.png">
                                        </div>
                                    </div>
                                </div>
                                <div id="divCategoryRe" class="comboboxs advance-select-box">
                                    <select class="advance-options" style="min-width: 200px;">
                                        <option class="advance-options" value="0">--Chọn loại nhà đất--</option>
                                        <option class="advance-options" value="324">- Bán căn hộ chung cư</option>
                                        <option class="advance-options" value="362">- Tất cả các loại nhà bán</option>
                                        <option class="advance-options" value="41">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà riêng </option>
                                        <option class="advance-options" value="325">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà biệt thự, liền kề</option>
                                        <option class="advance-options" value="163">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà mặt phố</option>
                                        <option class="advance-options" value="361">- Tất cả các loại đất bán</option>
                                        <option class="advance-options" value="40">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất nền dự án</option>
                                        <option class="advance-options" value="283">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất </option>
                                        <option class="advance-options" value="44">- Bán trang trại, khu nghỉ dưỡng</option>
                                        <option class="advance-options" value="45">- Bán kho, nhà xưởng</option>
                                        <option class="advance-options" value="48">- Bán loại bất động sản khác</option>
                                    </select>
                                </div>
                                <div id="divCity" class="comboboxs advance-select-box">
                                    <select class="advance-options select-province" style="min-width: 200px;">
                                        <option value="">--Chọn Tỉnh/Thành phố--</option>
                                        @foreach($province as $item)
                                            <option value="{{$item->id}}">{{$item->_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="divDistrict" class="comboboxs advance-select-box" title="">
                                    <select class="advance-options select-district" style="min-width: 200px;">
                                        <option value="0" class="advance-options" style="min-width: 168px;">--Chọn Quận/Huyện--</option>
                                    </select>
                                </div>
                                <div id="divWard" class="comboboxs advance-select-box" title="">
                                    <select class="advance-options select-ward" style="min-width: 200px;">
                                        <option value="0" class="advance-options" style="min-width: 168px;">--Chọn Phường/Xã--
                                        </option>
                                    </select>
                                </div>
                                <div id="divStreet" class="comboboxs advance-select-box adv-search" title="">
                                    <select class="advance-options select-street" style="min-width: 200px;">
                                        <option value="0" class="advance-options" style="min-width: 168px;">--Chọn Đường/Phố--
                                        </option>
                                    </select>
                                </div>
                                <div id="divArea" class="comboboxs advance-select-box">
                                    <select class="advance-options" style="min-width: 200px;">
                                        <option value="-1" class="advance-options" style="min-width: 168px;">--Chọn
                                            diện tích--
                                        </option>
                                        <option value="0" class="advance-options" style="min-width: 168px;">Chưa xác
                                            định
                                        </option>
                                        <option value="1" class="advance-options" style="min-width: 168px;">&lt;= 30
                                            m2
                                        </option>
                                        <option value="2" class="advance-options" style="min-width: 168px;">30 - 50
                                            m2
                                        </option>
                                        <option value="3" class="advance-options" style="min-width: 168px;">50 - 80
                                            m2
                                        </option>
                                        <option value="4" class="advance-options" style="min-width: 168px;">80 - 100
                                            m2
                                        </option>
                                        <option value="5" class="advance-options" style="min-width: 168px;">100 - 150
                                            m2
                                        </option>
                                        <option value="6" class="advance-options" style="min-width: 168px;">150 - 200
                                            m2
                                        </option>
                                        <option value="7" class="advance-options" style="min-width: 168px;">200 - 250
                                            m2
                                        </option>
                                        <option value="8" class="advance-options" style="min-width: 168px;">250 - 300
                                            m2
                                        </option>
                                        <option value="9" class="advance-options" style="min-width: 168px;">300 - 500
                                            m2
                                        </option>
                                        <option value="10" class="advance-options" style="min-width: 168px;">&gt;= 500
                                            m2
                                        </option>
                                    </select>
                                </div>
                                <div id="divPrice" class="comboboxs advance-select-box">
                                    <select class="advance-options" style="min-width: 200px;">
                                        <option value="-1" class="advance-options">--Chọn mức giá--</option>
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

                                <div id="divBedRoom" class="comboboxs advance-select-box adv-search">
                                    <select class="advance-options" style="min-width: 200px;">
                                        <option value="-1" class="advance-options" style="min-width: 168px;">--Chọn số
                                            phòng ngủ--
                                        </option>
                                        <option value="0" class="advance-options" style="min-width: 168px;">Không xác
                                            định
                                        </option>
                                        <option value="1" class="advance-options" style="min-width: 168px;">1+</option>
                                        <option value="2" class="advance-options" style="min-width: 168px;">2+</option>
                                        <option value="3" class="advance-options" style="min-width: 168px;">3+</option>
                                        <option value="4" class="advance-options" style="min-width: 168px;">4+</option>
                                        <option value="5" class="advance-options" style="min-width: 168px;">5+</option>
                                    </select>
                                </div>
                                <div id="divHomeDirection" class="comboboxs advance-select-box">
                                    <select class="advance-options" style="min-width: 200px;">
                                        <option value="-1" style="min-width: 168px;">--Chọn hướng nhà--</option>
                                        <option value="0" class="advance-options" style="min-width: 168px;">KXĐ</option>
                                        <option value="1" class="advance-options" style="min-width: 168px;">Đông</option>
                                        <option value="2" class="advance-options" style="min-width: 168px;">Tây</option>
                                        <option value="3" class="advance-options" style="min-width: 168px;">Nam</option>
                                        <option value="4" class="advance-options" style="min-width: 168px;">Bắc</option>
                                        <option value="5" class="advance-options" style="min-width: 168px;">Đông-Bắc
                                        </option>
                                        <option value="6" class="advance-options" style="min-width: 168px;">Tây-Bắc
                                        </option>
                                        <option value="7" class="advance-options" style="min-width: 168px;">Tây-Nam
                                        </option>
                                        <option value="8" class="advance-options" style="min-width: 168px;">Đông-Nam
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="timkiems">
                                <input type="image" name="action" class="btnSearch" src="/imgs/timkiem.jpg">
                            </div>
                            <div class="message" style="">Có <strong>38.975</strong> tin mới trong ngày</div>
                        </div>
                    </div>
                    <div style="display: none" id="divReSaler">
                        <div class="home-product-search">
                            <div id="searchArea">
                                <div id="divBrokerCategory" class="comboboxs advance-select-box" style="">
<span class="select-text" style="">
<span class="select-text-content" style="width: 75px;">--Chọn loại giao dịch--</span>
</span>
                                    <input type="hidden" name="cmbCategory" id="hdBrokerCategory" value="0">
                                    <div id="divBrokerCategoryOptions"
                                         class="advance-select-options advance-options" hddvalue="hdBrokerCategory"
                                         ddlid="divBrokerCategory" style="width: 200px;">
                                        <ul class="advance-options" style="min-width: 200px;">
                                            <li value="0" class="advance-options" style="min-width: 168px;">--Chọn loại
                                                giao dịch--
                                            </li>
                                            <li value="38" class="advance-options" style="min-width: 168px;">
                                                Nhà đất bán
                                            </li>
                                            <li value="49" class="advance-options" style="min-width: 168px;">
                                                Nhà đất cho thuê
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="timkiems">
                                    <input type="image" name="action" class="btnSearch"
                                           src="/imgs/timkiem.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="clear: both; margin-bottom: 10px;">
            </div>
            <div style="clear:both;"></div>
            <div class="container-commom">
                <div id="ctl30_HeaderContainer" class="box-header">
                    <div class="name_tit" align="center">
                        <h2 style="color: White;">
                            Tiêu điểm tuần qua</h2>
                    </div>
                </div>
                <div id="ctl30_BodyContainer" class="bor_box">
                    <div class="list">
                        <ul>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="4 nguyên nhân làm sụt giảm thanh khoản căn hộ condotel"
                                   href="{{env("APP_URL")}}/phan-tich-nhan-dinh/4-nguyen-nhan-lam-sut-giam-thanh-khoan-can-ho-condotel-ar96934">
                                    4 nguyên nhân làm sụt giảm thanh khoản căn hộ condotel</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Trung Quốc bùng nổ xu hướng mua, bán bất động sản qua mạng"
                                   href="{{env("APP_URL")}}/bat-dong-san-the-gioi/trung-quoc-bung-no-xu-huong-mua-ban-bat-dong-san-qua-mang-ar96918">
                                    Trung Quốc bùng nổ xu hướng mua, bán bất động sản qua mạng</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Bất động sản 2019: Đầu tư vào đâu để sinh lời?"
                                   href="{{env("APP_URL")}}/phan-tich-nhan-dinh/bat-dong-san-2019-dau-tu-vao-dau-de-sinh-loi-ar96914">
                                    Bất động sản 2019: Đầu tư vào đâu để sinh lời?</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Cả nước còn khoảng 2.300 căn hộ chung cư tồn kho"
                                   href="{{env("APP_URL")}}/tin-thi-truong/ca-nuoc-con-khoang-2-300-can-ho-chung-cu-ton-kho-ar96910">
                                    Cả nước còn khoảng 2.300 căn hộ chung cư tồn kho</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Triển vọng nào cho thị trường BĐS nhà ở Việt Nam 2019?"
                                   href="{{env("APP_URL")}}/tin-thi-truong/trien-vong-nao-cho-thi-truong-bds-nha-o-viet-nam-2019-ar96904">
                                    Triển vọng nào cho thị trường BĐS nhà ở Việt Nam 2019?</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Lừa bán đất dự án tràn lan: Gốc rễ do lòng tham"
                                   href="{{env("APP_URL")}}/tin-thi-truong/lua-ban-dat-du-an-tran-lan-goc-re-do-long-tham-ar96896">
                                    Lừa bán đất dự án tràn lan: Gốc rễ do lòng tham</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="ctl30_FooterContainer">
                </div>
            </div>
            <div style="clear: both; margin-bottom: 10px;">
            </div>
            <div class="container-commom">
                <div id="ctl34_HeaderContainer" class="box-header">
                    <div class="name_tit" align="center">
                        <h2 style="color: White;">
                            Lời khuyên</h2>
                    </div>
                </div>
                <div id="ctl34_BodyContainer" class="bor_box">
                    <div class="list">
                        <ul>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Luật sư chia sẻ kinh nghiệm để tránh &quot;sập bẫy&quot; lừa mua nhà trên giấy"
                                   href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-mua/luat-su-chia-se-kinh-nghiem-de-tranh-sap-bay-lua-mua-nha-tren-giay-ar96940">
                                    Luật sư chia sẻ kinh nghiệm để tránh "sập bẫy" lừa mua nhà trên giấy</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Nhiều gia đình bỏ lỡ cơ hội mua nhà chỉ vì không hợp phong thủy"
                                   href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-mua/nhieu-gia-dinh-bo-lo-co-hoi-mua-nha-chi-vi-khong-hop-phong-thuy-ar96877">
                                    Nhiều gia đình bỏ lỡ cơ hội mua nhà chỉ vì không hợp phong thủy</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Xây nhà to đẹp nhưng bỏ phí vì con cái không ở cùng"
                                   href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-mua/xay-nha-to-dep-nhung-bo-phi-vi-con-cai-khong-o-cung-ar96859">
                                    Xây nhà to đẹp nhưng bỏ phí vì con cái không ở cùng</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Mua nhà trả góp đường dài: Cẩn thận đuối sức!"
                                   href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-mua/mua-nha-tra-gop-duong-dai-can-than-duoi-suc-ar96856">
                                    Mua nhà trả góp đường dài: Cẩn thận đuối sức!</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Những lưu ý không thể bỏ qua khi vay mua nhà cuối năm"
                                   href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-mua/nhung-luu-y-khong-the-bo-qua-khi-vay-mua-nha-cuoi-nam-ar96786">
                                    Những lưu ý không thể bỏ qua khi vay mua nhà cuối năm</a>
                            </li>
                            <li>
                                <a class="controls-view-date-contents-link"
                                   title="Triệu phú Mỹ: Người trẻ hãy mạnh dạn nghĩ tới việc mua nhà"
                                   href="{{env("APP_URL")}}/loi-khuyen-cho-nguoi-mua/trieu-phu-my-nguoi-tre-hay-manh-dan-nghi-toi-viec-mua-nha-ar96736">
                                    Triệu phú Mỹ: Người trẻ hãy mạnh dạn nghĩ tới việc mua nhà</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="ctl34_FooterContainer">
                </div>
            </div>
            <div style="clear: both; margin-bottom: 10px;">
            </div>
            <div class="container-commom">
                <div id="ctl38_HeaderContainer" class="box-header">
                    <div class="name_tit" align="center">
                        <h2 style="color: White;">
                            Treo tranh phong thủy</h2>
                    </div>
                </div>
                <div id="ctl38_BodyContainer" class="bor_box">
                    <div style="text-align: center; padding-top: 5px;">
                    </div>
                    <div class="list">
                        <div class="aligncenter"><a
                                    href="{{env("APP_URL")}}/phong-thuy-toan-canh/bai-tri-tranh-phong-thuy-hop-tung-mua-trong-nam-ar96184"><img
                                        src="/imgs/20181022165531-8691.jpg"
                                        alt="Bài trí tranh phong thủy hợp từng mùa trong năm"
                                        title="Bài trí tranh phong thủy hợp từng mùa trong năm"></a></div>
                        <div style="display: block; margin: 5px 10px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">
                            <a href="{{env("APP_URL")}}/phong-thuy-toan-canh/bai-tri-tranh-phong-thuy-hop-tung-mua-trong-nam-ar96184"
                               style="color: #055699 !important; font-weight: bold;">Bài trí tranh phong thủy hợp
                                từng mùa trong năm</a></div>
                        <ul>
                            <li>
                                <a href="{{env("APP_URL")}}/phong-thuy-toan-canh/treo-tranh-ca-chep-the-nao-cho-hop-phong-thuy-ar93677"
                                   title="Treo tranh cá chép thế nào cho hợp phong thuỷ?">Treo tranh cá chép thế nào
                                    cho hợp phong thuỷ?</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tu-van-phong-thuy/y-nghia-va-cach-treo-tranh-thuan-buom-xuoi-gio-ar93623"
                                   title="Ý nghĩa và cách treo tranh &quot;Thuận buồm xuôi gió&quot;">Ý nghĩa và
                                    cách treo tranh "Thuận buồm xuôi gió"</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/phong-thuy-toan-canh/treo-tranh-phong-thuy-can-tranh-nhung-dieu-dai-ky-gi-ar93482"
                                   title="Treo tranh phong thủy cần tránh những điều đại kỵ gì?">Treo tranh phong
                                    thủy cần tránh những điều đại kỵ gì?</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/phong-thuy-toan-canh/ba-kieu-tranh-phong-thuy-giup-kich-hoat-tai-loc-ar92752"
                                   title="Ba kiểu tranh phong thủy giúp kích hoạt tài lộc">Ba kiểu tranh phong thủy
                                    giúp kích hoạt tài lộc</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/phong-thuy-toan-canh/cach-su-dung-tranh-ve-cho-trong-phong-thuy-nha-o-ar90992"
                                   title="Cách sử dụng tranh vẽ chó trong phong thủy nhà ở">Cách sử dụng tranh vẽ
                                    chó trong phong thủy nhà ở</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="ctl38_FooterContainer">
                </div>
            </div>
            <div style="clear: both; margin-bottom: 10px;">
            </div>
            <div class="container-commom">
                <div id="ctl41_HeaderContainer" class="box-header">
                    <h2 class="name_tit" align="center">
                        TƯ VẤN NỘI - NGOẠI THẤT
                    </h2>
                </div>
                <div id="ctl41_BodyContainer" class="bor_box">
                    <div class="tuvan">
                        <img src="/imgs/icon_user.png"
                             alt="">
                        <p>
                            <strong>Tư vấn nội - ngoại thất từ chuyên gia</strong>
                        </p>
                        <div>&nbsp;</div>
                    </div>
                    <div class="list">
                        <ul>
                            <li>
                                <a href="{{env("APP_URL")}}/tu-van-noi-ngoai-that/tu-van-thiet-ke-bo-tri-noi-that-nha-52m2-chi-phi-200-trieu-ar87141"
                                   title="Tư vấn thiết kế, bố trí nội thất nhà 52m2, chi phí 200 triệu">Tư vấn thiết
                                    kế, bố trí nội thất nhà 52m2, chi phí 200 triệu</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tu-van-noi-ngoai-that/cai-tao-can-ho-14m-thanh-khong-gian-song-da-nang-3-phong-ngu-ar85288"
                                   title="Cải tạo căn hộ 14m² thành không gian sống đa năng 3 phòng ngủ">Cải tạo căn
                                    hộ 14m² thành không gian sống đa năng 3 phòng ngủ</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tu-van-noi-ngoai-that/giai-phap-chong-nong-cho-can-ho-huong-tay-ar88766"
                                   title="Giải pháp chống nóng cho căn hộ hướng Tây">Giải pháp chống nóng cho căn hộ
                                    hướng Tây</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tu-van-noi-ngoai-that/tu-van-bo-tri-noi-that-cho-can-ho-100m-voi-chi-phi-200-trieu-ar83667"
                                   title="Tư vấn bố trí nội thất cho căn hộ 100m² với chi phí 200 triệu">Tư vấn bố
                                    trí nội thất cho căn hộ 100m² với chi phí 200 triệu</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tu-van-noi-ngoai-that/can-ho-kho-cai-tao-tro-nen-dep-bat-ngo-voi-chi-phi-217-trieu-ar84918"
                                   title="Căn hộ khó cải tạo trở nên đẹp bất ngờ với chi phí 217 triệu">Căn hộ khó
                                    cải tạo trở nên đẹp bất ngờ với chi phí 217 triệu</a>
                            </li>
                            <li>
                                <a href="{{env("APP_URL")}}/tu-van-noi-ngoai-that/khong-tinh-toan-ky-chung-toi-bo-phi-he-tu-tuong-tri-gia-ca-tram-trieu-ar92335"
                                   title="Không tính toán kỹ, chúng tôi bỏ phí hệ tủ tường trị giá cả trăm triệu">Không
                                    tính toán kỹ, chúng tôi bỏ phí hệ tủ tường trị giá cả trăm triệu</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="ctl41_FooterContainer">
                </div>
            </div>
            <div style="clear: both; margin-bottom: 10px;">
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="clear"></div>
        <div id="BottomMainContent"></div>
        <div class="footer-banner">
            <div id="SubBottomLeftMainContent" style="float: left; width: 495px">
                <div class="adPosition" positioncode="BANNER_POSITION_BOTTOM1" style="" hasshare="True"
                     hasnotshare="True"></div>
                <div style="clear:both;"></div>
            </div>
            <div id="SubBottomRightMainContent" style="float: left; width: 495px; margin-left: 5px">
                <div class="adPosition" positioncode="BANNER_POSITION_BOTTOM2" style="" hasshare="True"
                     hasnotshare="True"></div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <style type="text/css">
            .footer-bottom-top-1 a {
                white-space: nowrap;
            }
        </style>
    </div>
@endsection
@section('contentJS')

@endsection