<?php
use App\Library\Helpers;
?>
@section('meta')
    <base href="{{env('APP_URL')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta name="author" content="Bat Dong San Company">
    <meta name="copyright" content="{{env('APP_DOMAIN')}}" />
    <meta name="revisit-after" content="7 Days">
    <meta name="keywords" content="{{implode(';', explode(' ', $article->title))}}">
    <meta name="description" content="{{$article->title}}, {{$article->province}}, {{$article->district}}{{$article->project ? ', dự án '.$article->project : ''}}{{$article->area ? ', Diện tích sử dụng riêng: '.$article->area.'m2' : ''}}{{$article->bed_room ? ', có tới '.$article->bed_room.' phòng ngủ' : ''}}
    {{$article->toilet ? ', có tới '.$article->toilet.' toilet' : ''}}{{$article->contact_name ? ', liên hệ '.$article->contact_name : ''}}{{$article->contact_phone ? ', số điện thoại '.$article->contact_phone : ''}}{{$article->floor ? ', số tầng '.$article->floor : ''}}">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="image_src" href="{{env('APP_URL')}}{{$article->gallery_image ? Helpers::file_path($article->id, PUBLIC_ARTICLE_BUY, true).THUMBNAIL_PATH.json_decode($article->gallery_image)[0] : THUMBNAIL_DEFAULT }}" />
    <meta name="title" content="{{$article->title}}" />
    <meta property="og:image" content="{{env('APP_URL')}}{{$article->gallery_image ? Helpers::file_path($article->id, PUBLIC_ARTICLE_BUY, true).THUMBNAIL_PATH.json_decode($article->gallery_image)[0] : THUMBNAIL_DEFAULT }}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="{{$article->title}}" />
    <meta property="og:description" content="{{$article->title}}, {{$article->province}}, {{$article->district}}{{$article->project ? ', dự án '.$article->project : ''}}{{$article->area ? ', Diện tích sử dụng riêng: '.$article->area.'m2' : ''}}{{$article->bed_room ? ', có tới '.$article->bed_room.' phòng ngủ' : ''}}
    {{$article->toilet ? ', có tới '.$article->toilet.' toilet' : ''}}{{$article->contact_name ? ', liên hệ '.$article->contact_name : ''}}{{$article->contact_phone ? ', số điện thoại '.$article->contact_phone : ''}}{{$article->floor ? ', số tầng '.$article->floor : ''}}" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
@extends('layouts.app')
@section('content')
    @include('layouts.top_search')
    <div class="div_2col">
        <div class="body-left">
            <div style="clear: both;">
            </div>
            <div class="container-default">
                <div>
                    <div class="product-list product-list-page" pagekey="afgYRJI2uSWSXQ70P/5TjQ==">
                        <div id="product-detail">
                            <div class="pm-title">
                                <h1 itemprop="name">
                                    {{$article->title}}
                                </h1>
                            </div>
                            <div class="kqchitiet">
                                <span class="diadiem-title mar-right-15">
                                <b>Khu vực:</b> {{$article->address}}</span>
                                <span style="display: inline-block;"><span class="gia-title mar-right-15">
                                <b>
                                    @if($typeOf == 'lease')
                                        Giá: </b><strong>{{($article->ddlPriceType == 'thỏa thuận' || !$article->price) ? 'Thỏa thuận' : (number_format($article->price).' '.$article->ddlPriceType)}}&nbsp;</strong>
                                        </span>
                                        <span class="gia-title">
                                        <b>
                                        Diện tích:</b>
                                        <strong>{{$article->area ? $article->area.' m²' : 'Chưa xác định'}}</strong>
                                    @else
                                        Giá: </b><strong>{{($article->price_from && $article->price_to) ? $article->price_from .' - '. $article->price_to . ' '.$article->ddlPriceType : 'Thỏa thuận'}}</strong>
                                        </span>
                                        <span class="gia-title">
                                        <b>
                                        Diện tích:</b>
                                        <strong>{{($article->area_from && $article->area_to) ? $article->area_from .' - '. $article->area_to .' m²' : 'Chưa xác định'}}</strong>
                                    @endif

                                </span>
                                </span>
                            </div>
                            <div class="clear"></div>
                            <div class="pm-mota">
                                Thông tin mô tả
                            </div>
                            <div class="pm-content">
                                <div class="pm-desc">
                                    <?php echo $article->content_article ?>
                                    @if($article->gallery_image)
                                        <div class="pm-mota">
                                            Thông hình ảnh
                                        </div>
                                        @foreach(json_decode($article->gallery_image) as $item)
                                            @if($typeOf == 'lease')
                                                <img itemprop="image" src="{{Helpers::file_path($article->id, PUBLIC_ARTICLE_LEASE, true).$item}}" alt="{{$article->title}}" style="width:100%; height:auto;" id="imgSlide1">
                                            @else
                                                <img itemprop="image" src="{{Helpers::file_path($article->id, PUBLIC_ARTICLE_BUY, true).$item}}" alt="{{$article->title}}" style="width:100%; height:auto;" id="imgSlide1">
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div style="clear: both">
                            </div>
                            <!-- begin content-detail-->
                            <div class="div-table">
                                <div class="div-table-row">
                                    <div class="div-table-cell table1">
                                        <div class="div-hold">
                                            <div class="header">Đặc điểm bất động sản</div>
                                            <div class="table-detail">
                                                <div class="row">
                                                    <div class="left">
                                                        Loại tin rao
                                                    </div>
                                                    <div class="right">
                                                        {{$article->method_article}}
                                                    </div>
                                                    <div style="clear: both">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="left">
                                                        Địa chỉ
                                                    </div>
                                                    <div class="right">
                                                        {{$article->address}}
                                                    </div>
                                                    <div style="clear: both">
                                                    </div>
                                                </div>
                                                @if($article->facade)
                                                <div id="LeftMainContent__productDetail_direction" class="row">
                                                    <div class="left">
                                                        Mặt tiền (m)
                                                    </div>
                                                    <div class="right">
                                                        {{$article->facade}}
                                                    </div>
                                                    <div style="clear: both">
                                                    </div>
                                                </div>
                                                @endif
                                                @if($article->land_width)
                                                    <div id="LeftMainContent__productDetail_direction" class="row">
                                                        <div class="left">
                                                            Đường vào (m)
                                                        </div>
                                                        <div class="right">
                                                            {{$article->land_width}}
                                                        </div>
                                                        <div style="clear: both">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($article->ddlHomeDirection)
                                                    <div id="LeftMainContent__productDetail_direction" class="row">
                                                        <div class="left">
                                                            Hướng nhà
                                                        </div>
                                                        <div class="right">
                                                            {{$article->ddlHomeDirection}}
                                                        </div>
                                                        <div style="clear: both">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($article->ddl_bacon_direction)
                                                    <div id="LeftMainContent__productDetail_direction" class="row">
                                                        <div class="left">
                                                            Hướng ban công
                                                        </div>
                                                        <div class="right">
                                                            {{$article->ddl_bacon_direction}}
                                                        </div>
                                                        <div style="clear: both">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($article->floor)
                                                    <div id="LeftMainContent__productDetail_direction" class="row">
                                                        <div class="left">
                                                            Số tầng
                                                        </div>
                                                        <div class="right">
                                                            {{$article->floor}}
                                                        </div>
                                                        <div style="clear: both">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($article->bed_room)
                                                    <div id="LeftMainContent__productDetail_direction" class="row">
                                                        <div class="left">
                                                            Số phòng ngủ
                                                        </div>
                                                        <div class="right">
                                                            {{$article->bed_room}}
                                                        </div>
                                                        <div style="clear: both">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($article->toilet)
                                                    <div id="LeftMainContent__productDetail_direction" class="row">
                                                        <div class="left">
                                                            Số toilet
                                                        </div>
                                                        <div class="right">
                                                            {{$article->toilet}}
                                                        </div>
                                                        <div style="clear: both">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($article->furniture)
                                                    <div id="LeftMainContent__productDetail_direction" class="row">
                                                        <div class="left">
                                                            Nội thất
                                                        </div>
                                                        <div class="right">
                                                            {{$article->furniture}}
                                                        </div>
                                                        <div style="clear: both">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="div-table-cell" style="width: 15px;"></div>
                                    <div class="div-table-cell table2">
                                        <div class="header">Liên hệ</div>
                                        <div class="table-detail">
                                            <!--begin right-->
                                            <div id="divCustomerInfo">
                                                <div id="LeftMainContent__productDetail_contactName" class="right-content">
                                                    <div class="normalblue left">
                                                        Tên liên lạc
                                                    </div>
                                                    <div class="right" style="text-transform:capitalize;">
                                                        {{$article->contact_name}}
                                                    </div>
                                                    <div style="clear: both">
                                                    </div>
                                                </div>
                                                <div id="LeftMainContent__productDetail_contactMobile" class="right-content">
                                                    <div class="normalblue left">
                                                        Mobile
                                                    </div>
                                                    <div class="right">
                                                        {{$article->contact_phone}}
                                                    </div>
                                                    <div style="clear: both">
                                                    </div>
                                                </div>
                                                @if($article->contact_email)
                                                <div id="contactEmail" class="right-content">
                                                    <div class="normalblue left">
                                                        Email
                                                    </div>
                                                    <div class="right">
                                                        {{$article->contact_email}}
                                                    </div>
                                                    <div style="clear: both">
                                                    </div>
                                                </div>
                                                @endif
                                                <div style="clear: both" id="divbreak"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prd-more-info">
                                <div style="width: 170px">
                                    <span class="normalblue">Mã tin đăng: </span>
                                        {{$article->id}}
                                </div>
                                <div style="width: 220px">
                                    <span class="normalblue">Loại hình tin đăng:</span>
                                    Tin Vip đặc biệt
                                </div>
                                <div style="width: 175px">
                                    <span class="normalblue">Ngày đăng:</span>
                                    {{date('d-m-Y', strtotime($article->created_at))}}
                                </div>
                                <a id="facebook" target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;t={{$article->title}}">
                                    <img src="https://file4.batdongsan.com.vn/images/opt/btn-share-facebook.png"></a>
                                <a id="googleBookmark" target="_blank" rel="nofollow" href="https://plus.google.com/share?url={{url()->current()}}">
                                    <img src="https://file4.batdongsan.com.vn/images/opt/btn-share-gplus.png"></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    @include('layouts.slider_bar_right')
@endsection
@section('contentJS')
    <script>
        function changeSort(val) {
            console.log(window.location);
            window.location.href = window.location.origin + window.location.pathname + '?sort=' + val;
        }
        <?php
        if(isset($_SESSION['order_page_lease'])) {
        ?>
        document.getElementById('ddlSortReult').value = '<?php echo $_SESSION['order_page_lease'] ?>';
        <?php
        }
        ?>
    </script>
@endsection