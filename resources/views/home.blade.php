<?php
use App\Library\Helpers;
global $noibat;
?>
@include('cache.tin_noi_bat')
@section('meta')
    <base href="{{env('APP_URL')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta name="author" content="Bat Dong San Company">
    <meta name="copyright" content="{{env('APP_DOMAIN')}}" />
    <meta name="revisit-after" content="7 Days">
    <meta name="keywords" content="batdongsan; rao ban bat dong san; bds; bat dong san Ho Chi Minh; bat dong san Ha Noi; cap nhat bat dong san; thu bat dong san; mua dat; thue dat; can thue nha; can thue dat">
    <meta name="description" content="Nhà đất bán, Bán căn hộ chung cư, Bán nhà biệt thự, liền kề, Bán nhà mặt phố, Bán đất nền dự án, Bán đất, Nhà đất cho thuê, Cho thuê căn hộ chung cư,
        Cho thuê nhà riêng, Cho thuê nhà mặt phố, Cho thuê nhà trọ, phòng trọ, Cho thuê văn phòng, Cho thuê kho, nhà xưởng, đất, Mua nhà riêng, Cần thuê kho, nhà xưởng, đất, Cần thuê nhà trọ, phòng trọ, Tất cả các loại đất bán">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="image_src" href="{{env('APP_URL') . PATH_LOGO_DEFAULT}}" />
    <meta name="title" content="Bất Động Sản Company" />
    <meta property="og:image" content="{{env('APP_URL') . PATH_LOGO_DEFAULT}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="Bất Động Sản Company" />
    <meta property="og:description" content="batdongsan; rao ban bat dong san; bds; bat dong san Ho Chi Minh; bat dong san Ha Noi; cap nhat bat dong san; thu bat dong san; mua dat; thue dat; can thue nha; can thue dat">
    <meta name="description" content="Nhà đất bán, Bán căn hộ chung cư, Bán nhà biệt thự, liền kề, Bán nhà mặt phố, Bán đất nền dự án, Bán đất, Nhà đất cho thuê, Cho thuê căn hộ chung cư,
        Cho thuê nhà riêng, Cho thuê nhà mặt phố, Cho thuê nhà trọ, phòng trọ, Cho thuê văn phòng, Cho thuê kho, nhà xưởng, đất, Mua nhà riêng, Cần thuê kho, nhà xưởng, đất, Cần thuê nhà trọ, phòng trọ, Tất cả các loại đất bán" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
@extends('layouts.app')
@section('content')
    @include('layouts.top_search')
    <div class="div_2col">
        <div id="TopRightMainContent" class="col_cent">
            <div class="news-list-border-background">
                <ul class="news-list-thumb">
                    @foreach($noibat as $key => $item)
                        <li style="{{$key == 0 ? 'display: block;' : 'display: none;'}}" id="li_{{$key}}">
                            <a href="/{{$item['slug_category']}}/{{$item['slug']}}"
                               title="{{$item['title']}}">
                                <img class="imagethumbnail"
                                     alt="{{$item['title']}}"
                                     src="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}}"
                                     style="float:left;">
                            </a>
                            <div class="thumb-title">
                                <a href="/{{$item['slug_category']}}/{{$item['slug']}}"
                                   title="{{$item['title']}}">{{$item['title']}}</a>
                            </div>
                            <div class="thumb-summary"><?php echo $item['short_content'] ?></div>
                        </li>
                            @if($key == 5)
                                @break
                            @endif
                    @endforeach
                </ul>
                <div style="clear: both;">
                </div>
                <div class="news-slide-show-item">
                    <div class="news-list">
                        <ul>
                            @foreach($noibat as $key => $item)
                            <li>
                                <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                            </li>
                            @endforeach
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
                            @foreach($articleForLease as $item)
                                <div class="article_for_lease vip0">
                                    <div class="p-main">
                                        <div class="p-main-image-crop">
                                            <a class="product-avatar"
                                               href="/{{$item->prefix_url.'-bds-'.$item->id}}"
                                               onclick="">
                                                <img class="product-avatar-img"
                                                     src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}"
                                                     alt="{{$item['title']}}">
                                            </a>
                                        </div>
                                        <div class="p-content">
                                            <div class="p-title">
                                                <h3><a id="ctl31_ctl00_rpListProduct_lnkTitle_0"
                                                       title="{{$item['title']}}"
                                                       href="/{{$item->prefix_url.'-bds-'.$item->id}}">{{$item['title']}}</a></h3>
                                            </div>
                                        </div>
                                        <div class="p-bottom-crop">
                                            <div class="p-bottom-left">
                                                <div>
                                                    <div class="left">Giá</div>
                                                    :&nbsp;{{$item->price_real == 0 ? 'Thỏa thuận' : number_format($item->price).' '.$item->ddlPriceType}}
                                                </div>
                                                <div>
                                                    <div class="left">Diện tích</div>
                                                    :&nbsp;{{$item->area ? $item->area.' m²' : 'Chưa xác định'}}
                                                </div>
                                                <div>
                                                    <div class="fleft">
                                                        <div class="left">Quận/huyện</div>
                                                        :&nbsp;<a class="link_blue"
                                                                  href="#"
                                                                  title="Bán nhà riêng tại {{$item->district}}">{{$item->district}}</a>, <a
                                                                class="link_blue"
                                                                href="#"
                                                                title="Bán nhà riêng tại {{$item->province}}">{{$item->province}}</a>
                                                    </div>
                                                    <div class="p-bottom-right font09">{{date('d-m-Y', strtotime($item->created_at))}}</div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="otherlink"><a
                                        href="{{env("APP_URL")}}/nha-dat-ban?page=2"
                                        class="link_sr" style="text-decoration: none">Xem tin trang kế tiếp</a></div>
                        </div>
                        <div style="margin: 5px 0;">
                            <div style="float: left">
                                Tin Nhà đất bán mới nhất:
                                <span id="ctl31_ctl00_lbLinkNewProductForSell">
                                    <a href="{{env("APP_URL")}}/nha-dat-ban?page=1" class="link_blue">1</a>,
                                    <a href="{{env("APP_URL")}}/nha-dat-ban?page=2" class="link_blue">2</a>,
                                    <a href="{{env("APP_URL")}}/nha-dat-ban?page=3" class="link_blue">3</a></span>...
                            </div>
                            <div style="float: right">
                                Tin Nhà đất cho thuê mới nhất:
                                <span id="ctl31_ctl00_lbLinkNewProductForRent">
                                    <a href="{{env("APP_URL")}}/nha-dat-cho-thue?page=1" class="link_blue">1</a>,
                                    <a href="{{env("APP_URL")}}/nha-dat-cho-thue?page=2" class="link_blue">2</a>,
                                    <a href="{{env("APP_URL")}}/nha-dat-cho-thue?page=3" class="link_blue">3</a></span>...
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
    @include('layouts.slider_bar_right')
@endsection
@section('contentJS')

@endsection