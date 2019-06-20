<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
global $noibat;
global $all_tin_tuc_moi;
$Agent = new Agent();
?>
@include('cache.tin_noi_bat')
@include('cache.all_tin_tuc_moi')
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
    <link rel="image_src" href="{{env('APP_URL') . THUMBNAIL_DEFAULT}}" />
    <meta name="title" content="Bất Động Sản Company" />
    <meta property="og:image" content="{{env('APP_URL') . THUMBNAIL_DEFAULT}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="Bất Động Sản Company" />
    <meta property="og:description" content="batdongsan; rao ban bat dong san; bds; bat dong san Ho Chi Minh; bat dong san Ha Noi; cap nhat bat dong san; thu bat dong san; mua dat; thue dat; can thue nha; can thue dat">
    <meta name="description" content="Nhà đất bán, Bán căn hộ chung cư, Bán nhà biệt thự, liền kề, Bán nhà mặt phố, Bán đất nền dự án, Bán đất, Nhà đất cho thuê, Cho thuê căn hộ chung cư,
        Cho thuê nhà riêng, Cho thuê nhà mặt phố, Cho thuê nhà trọ, phòng trọ, Cho thuê văn phòng, Cho thuê kho, nhà xưởng, đất, Mua nhà riêng, Cần thuê kho, nhà xưởng, đất, Cần thuê nhà trọ, phòng trọ, Tất cả các loại đất bán" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
@if($Agent->isMobile())
@section('contentCSS')
    <link rel="stylesheet" type="text/css" href="/css/mobile.css">
@endsection
@endif
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
                                <div class="article_for_lease vip5">
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
                                        <div class="right-content-home">
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
                                                        <div class="left">Giá:</div><div class="right_m">&nbsp;{{($item->price_from != null && $item->price_to != null) ? ($item->price_to ? ($item->price_from. ' - ' .$item->price_to) : $item->price_from).' '.$item->ddlPriceType : ($item->price_real == 0 ? 'Thỏa thuận' : $item->price.' '.$item->ddlPriceType)}}</div>
                                                    </div>
                                                    <div>
                                                        <div class="left">Diện tích:</div><div class="right_m">&nbsp;{{($item->area_from != null && $item->area_to != null) ? ($item->area_to ? ($item->area_from. ' - ' .$item->area_to.' m²') : $item->area_from) : ($item->area ? $item->area.' m²' : 'Chưa xác định')}}</div>
                                                    </div>
                                                    <div>
                                                        <?php
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
                                                        <div class="fleft">
                                                            <div class="left">Quận/huyện:</div>
                                                            &nbsp;<a class="link_blue"
                                                                      href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item->province_id}}/{{$item->district_id}}/-1/-1/-1/-1/-1/-1/-1"
                                                                      title="Bán nhà riêng tại {{$item->district}}">{{$item->district}}</a>, <a
                                                                    class="link_blue"
                                                                    href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item->province_id}}/-1/-1/-1/-1/-1/-1/-1/-1"
                                                                    title="Bán nhà riêng tại {{$item->province}}">{{$item->province}}</a>
                                                        </div>
                                                        <div class="p-bottom-right font09">{{date('d/m/Y', strtotime($item->created_at))}}</div>
                                                        <div class="clear"></div>
                                                    </div>
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
                                        <h3><a href="/tu-van-luat-bat-dong-san"
                                               title="Tư vấn luật" style="font-size: 11px;">
                                                Tư vấn luật</a></h3>
                                    </div>
                                    <div class="t_left-baiviet-header-right-link">
                                        <h3><a href="/phan-tich-nhan-dinh" title="Phân tích - nhận định"
                                               style="font-size: 11px;">Phân tích - nhận định</a></h3>
                                    </div>
                                    <div class="t_left-baiviet-header-right-link">
                                        <h3><a href="/bat-dong-san-the-gioi" title="Bất động sản thế giới"
                                               style="font-size: 11px;">Bất động sản thế giới</a></h3>
                                    </div>
                                    <div class="t_left-baiviet-header-right-link">
                                        <h3><a href="/tai-chinh-chung-khoan-bat-dong-san"
                                               title="Nội - Ngoại thất" style="font-size: 11px;">Tài chính - Chứng khoán - BĐS</a></h3>
                                    </div>
                                    <div class="clear">
                                    </div>
                                </div>
                            </div>
                            <div class="line-home">
                            </div>
                            <?php
                            $newsFooter = Helpers::getRandLimitArr($all_tin_tuc_moi, 10);
                            ?>
                            @if($newsFooter)
                            <div class="t_left-baiviet-content">
                                <div class="group-news-border-backgroup">
                                    <a href="/{{$newsFooter[0]['slug_category']}}/{{$newsFooter[0]['slug']}}">
                                        <img style="border: 1px solid #ccc;"
                                             src="{{$newsFooter[0]['image'] ? '/'.$newsFooter[0]['image'] : THUMBNAIL_DEFAULT}}"
                                             alt="{{$newsFooter[0]['title']}}">
                                    </a>
                                    <div class="group-news-title">
                                        <h4>
                                            <a href="/{{$newsFooter[0]['slug_category']}}/{{$newsFooter[0]['slug']}}"
                                               title="{{$newsFooter[0]['title']}}">{{$newsFooter[0]['title']}}
                                            </a></h4>
                                    </div>
                                    <div class="group-news-summary">{{substr($newsFooter[0]['short_content'], 0, 100)}}...</div>
                                </div>
                                <div class="group-news-border-backgroup">
                                    <a href="/{{$newsFooter[1]['slug_category']}}/{{$newsFooter[1]['slug']}}">
                                        <img style="border: 1px solid #ccc;"
                                             src="{{$newsFooter[1]['image'] ? '/'.$newsFooter[1]['image'] : THUMBNAIL_DEFAULT}}"
                                             alt="{{$newsFooter[1]['title']}}">
                                    </a>
                                    <div class="group-news-title">
                                        <h4>
                                            <a href="/{{$newsFooter[1]['slug_category']}}/{{$newsFooter[1]['slug']}}"
                                               title="{{$newsFooter[1]['title']}}">{{$newsFooter[1]['title']}}
                                            </a></h4>
                                    </div>
                                    <div class="group-news-summary">{{substr($newsFooter[1]['short_content'], 0, 100)}}...</div>
                                </div>
                                <div class="clear"></div>
                                <div class="group-news-border-backgroup">
                                    <a href="/{{$newsFooter[2]['slug_category']}}/{{$newsFooter[2]['slug']}}">
                                        <img style="border: 1px solid #ccc;"
                                             src="{{$newsFooter[2]['image'] ? '/'.$newsFooter[2]['image'] : THUMBNAIL_DEFAULT}}"
                                             alt="{{$newsFooter[2]['title']}}">
                                    </a>
                                    <div class="group-news-title">
                                        <h4>
                                            <a href="/{{$newsFooter[2]['slug_category']}}/{{$newsFooter[2]['slug']}}"
                                               title="{{$newsFooter[2]['title']}}">{{$newsFooter[2]['title']}}
                                            </a></h4>
                                    </div>
                                    <div class="group-news-summary">{{substr($newsFooter[2]['short_content'], 0, 100)}}...</div>
                                </div>
                                <div class="group-news-border-backgroup">
                                    <a href="/{{$newsFooter[3]['slug_category']}}/{{$newsFooter[3]['slug']}}">
                                        <img style="border: 1px solid #ccc;"
                                             src="{{$newsFooter[3]['image'] ? '/'.$newsFooter[3]['image'] : THUMBNAIL_DEFAULT}}"
                                             alt="{{$newsFooter[3]['title']}}">
                                    </a>
                                    <div class="group-news-title">
                                        <h4>
                                            <a href="/{{$newsFooter[3]['slug_category']}}/{{$newsFooter[3]['slug']}}"
                                               title="{{$newsFooter[3]['title']}}">{{$newsFooter[3]['title']}}
                                            </a></h4>
                                    </div>
                                    <div class="group-news-summary">{{substr($newsFooter[3]['short_content'], 0, 100)}}...</div>
                                </div>
                                <div class="clear"></div>
                                <div style="clear: both">
                                </div>
                                <div class="art-latest">
                                    <div class="art-item">
                                        <ul>
                                            <?php unset($newsFooter[0]); unset($newsFooter[1]); unset($newsFooter[2]); unset($newsFooter[3]) ?>
                                            @foreach($newsFooter as $item)
                                                <li>
                                                    <a href="/{{$item['slug_category']}}/{{$item['slug']}}"
                                                       title="{{$item['title']}}">{{$item['title']}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
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