<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
global $all_tin_tuc_moi;
$Agent = new Agent();
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
    <link rel="image_src" href="{{env('APP_URL')}}{{$article->gallery_image ? Helpers::file_path($article->id, ($typeOf == 'lease' ? PUBLIC_ARTICLE_LEASE : PUBLIC_ARTICLE_BUY), true).json_decode($article->gallery_image)[0] : THUMBNAIL_DEFAULT_2 }}" />
    <meta name="title" content="{{$article->title}}" />
    <meta property="og:image" content="{{env('APP_URL')}}{{$article->gallery_image ? Helpers::file_path($article->id, ($typeOf == 'lease' ? PUBLIC_ARTICLE_LEASE : PUBLIC_ARTICLE_BUY), true).json_decode($article->gallery_image)[0] : THUMBNAIL_DEFAULT_2 }}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="{{$article->title}}" />
    <meta property="og:description" content="{{$article->title}}, {{$article->province}}, {{$article->district}}{{$article->project ? ', dự án '.$article->project : ''}}{{$article->area ? ', Diện tích sử dụng riêng: '.$article->area.'m2' : ''}}{{$article->bed_room ? ', có tới '.$article->bed_room.' phòng ngủ' : ''}}
    {{$article->toilet ? ', có tới '.$article->toilet.' toilet' : ''}}{{$article->contact_name ? ', liên hệ '.$article->contact_name : ''}}{{$article->contact_phone ? ', số điện thoại '.$article->contact_phone : ''}}{{$article->floor ? ', số tầng '.$article->floor : ''}}" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
@section('contentCSS')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @if($Agent->isMobile())
    <link rel="stylesheet" type="text/css" href="/css/mobile.css">
    @endif
@endsection
@extends('layouts.app')
@section('content')
    @include('layouts.top_search')
    <link rel="stylesheet" type="text/css" href="/css/slidershow.css">
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
                                        Giá: </b><strong>{{($article->ddlPriceType == 'thỏa thuận' || !$article->price) ? 'Thỏa thuận' : ($article->price.' '.$article->ddlPriceType)}}&nbsp;</strong>
                                        </span>
                                        <span class="gia-title">
                                        <b>
                                        Diện tích:</b>
                                        <strong>{{$article->area ? $article->area.' m²' : 'Chưa xác định'}}</strong>
                                    @else
                                        Giá: </b><strong>{{($article->price_from && $article->price_to) ? $article->price_from .' - '. $article->price_to . ' '.$article->ddlPriceType : ($article->price_from ? $article->price_from . ' ' . $article->ddlPriceType : 'Thỏa thuận')}}</strong>
                                        </span>
                                        <span class="gia-title">
                                        <b>
                                        Diện tích:</b>
                                        <strong>{{($article->area_from && $article->area_to) ? $article->area_from .' - '. $article->area_to .' m²' : ($article->area_from ? $article->area_from . ' m²' : 'Chưa xác định')}}</strong>
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
                                    <?php echo str_replace("\r\n", '<br/>', $article->content_article) ?>
                                    @if($article->gallery_image)
                                        <div class="pm-mota">
                                            Thông tin hình ảnh
                                        </div>
                                        <div class="slideshow-container">
                                            <?php
                                                $preFixImage = $typeOf == 'lease' ? PUBLIC_ARTICLE_LEASE : PUBLIC_ARTICLE_BUY;
                                                $gallery = json_decode($article->gallery_image);
                                                $MaxImgs = count($gallery);
                                            ?>
                                            @foreach($gallery as $key => $item)
                                                <div class="mySlides fade">
                                                    <div class="numbertext">{{++$key}} / {{$MaxImgs}}</div>
                                                    <img height="502px" src="{{Helpers::file_path($article->id, $preFixImage, true).$item}}" style="width:100%">
                                                </div>
                                            @endforeach
                                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                        </div>
                                        <br>

                                        <div style="text-align:left">
                                            @foreach(json_decode($article->gallery_image) as $key => $item)
                                                <div class="dot" onclick="currentSlide({{++$key}})">
                                                    <img src="{{Helpers::file_path($article->id, $preFixImage, true).THUMBNAIL_PATH.$item}}" />
                                                </div>
                                            @endforeach
                                        </div>
                                        <script>
                                            var slideIndex = 1;
                                            showSlides(slideIndex);

                                            function plusSlides(n) {
                                                showSlides(slideIndex += n);
                                            }

                                            function currentSlide(n) {
                                                showSlides(slideIndex = n);
                                            }

                                            function showSlides(n) {
                                                var i;
                                                var slides = document.getElementsByClassName("mySlides");
                                                var dots = document.getElementsByClassName("dot");
                                                if (n > slides.length) {slideIndex = 1}
                                                if (n < 1) {slideIndex = slides.length}
                                                for (i = 0; i < slides.length; i++) {
                                                    slides[i].style.display = "none";
                                                }
                                                for (i = 0; i < dots.length; i++) {
                                                    dots[i].className = dots[i].className.replace(" active", "");
                                                }
                                                slides[slideIndex-1].style.display = "block";
                                                dots[slideIndex-1].className += " active";
                                            }
                                        </script>
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
                                                    <?php
                                                        $avatarArticleUser = Helpers::file_path($article->user_id, AVATAR_PATH, true).$article->user_id.'.png';
                                                    ?>
                                                    @if(file_exists(public_path() . $avatarArticleUser))
                                                    <div class="customer-avatar">
                                                        <img width="80px" src="{{$avatarArticleUser}}">
                                                    </div>
                                                    @endif
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
                                    Tin thường
                                </div>
                                <div style="width: 175px">
                                    <span class="normalblue">Ngày đăng:</span>
                                    {{date('d-m-Y', strtotime($article->created_at))}}
                                </div>
                                <a id="facebook" target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;t={{$article->title}}">
                                    <img src="/imgs/btn-share-facebook.png"></a>
                                <a id="googleBookmark" target="_blank" rel="nofollow" href="https://plus.google.com/share?url={{url()->current()}}">
                                    <img src="/imgs/btn-share-gplus.png"></a>
                            </div>
                            <div class="clear"></div>
                            <div class="pm-bottom">
                                <div>
                                    <b>
                                        Lưu ý
                                    </b>
                                    Quý vị đang xem nội dung tin rao "{{$article->title}}". Mọi thông tin liên quan tới tin rao này là do người đăng tin chịu trách nhiệm. Chúng tôi luôn cố gắng hết sức để có chất lượng tin rao tốt nhất nhưng chúng tôi không đảm bảo và không chịu trách nhiệm về bất kỳ nội dung nào liên quan tới tin rao này.
                                    Khi Quý vị phát hiện trường hợp tin rao không hợp lệ như trùng lặp, thông tin sai hoặc không đúng thực tế,... ngay lập tức xin hãy <a class="openFancy fancybox.iframe" onclick="report()" href="javascript:void(0)" rel="nofollow">thông báo cho chúng tôi.</a>.
                                </div>
                            </div>
                            @if(count($relateArticle))
                                <div class="clear"></div>
                                <div class="container-default">
                                <div>
                                    <div class="product-list other-product product-list-new">
                                        <div class="viewmore" style="margin-bottom: 8px; margin-top: 8px">
                                            Xem thêm các bất động sản khác
                                        </div>
                                        <div class="Main" id="lstProductSimilar">
                                            <div class="Header">
                                                <div class="Left">
                                                </div>
                                                <div class="Repeat">
                                                    <h2>
                                                        {{$article->method_article}} tại {{$article->district}}
                                                    </h2>
                                                </div>
                                                <div class="Right">
                                                </div>
                                            </div>
                                            @foreach($relateArticle as $item)
                                                <div class="vip5 search-productItem">
                                                    <div class="p-title" style="padding-left: 7px;">
                                                        <h3>
                                                            <a href="/{{$item['prefix_url'].'-bds-'.$item['id']}}" title="{{$item['title']}}" style="text-rendering: optimizelegibility;">
                                                                {{$item['title']}}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div class="p-main">
                                                        <div class="p-main-image-crop">
                                                            <a class="product-avatar" href="/{{$item['prefix_url'].'-bds-'.$item['id']}}" title="{{$item['title']}}" onclick="">
                                                                <img class="product-avatar-img" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}" alt="{{$item['title']}}">
                                                            </a>
                                                        </div>
                                                        <div class="p-content"><div>
                                                        <p><?php echo preg_replace("/(\r?\n){2,}/", "<br/>", mb_substr($item['content_article'], 0, LIMIT_SHORT_CONTENT_RELATE, "utf-8").'...')?></p>
                                                        </div></div>
                                                        <div class="p-bottom-crop" style=" width: 100%; display: contents;">
                                                            <div class="floatleft">
                                                                <span> Giá: <strong class="product-price">{{$item['price_real'] == 0 ? 'Thỏa thuận' : $item['price'].' '.$item['ddlPriceType']}}</strong></span>
                                                                <span> Diện tích:
                                                                <strong class="product-area">{{$item['area'] ? $item['area'].' m²' : 'Chưa xác định'}}</strong></span>
                                                                 <span> Quận/huyện:
                                                                <strong class="product-city-dist">
                                                                @if($item['district'])
                                                                    {{$item['district']}},
                                                                @endif
                                                                @if($item['province'])
                                                                    {{$item['province']}}
                                                                @endif
                                                                </strong></span>
                                                            </div>
                                                            <div class="floatright mar-right-10">
                                                                <span>{{date('d/m/Y', strtotime($item['created_at']))}}</span>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clear10"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="clear">
                                    </div>
                                    <p id="view_other_product">
                                        <?php
                                        if($article->method_article == 'Nhà đất cần mua') {
                                            $searchMethod = 'nha-dat-can-mua';
                                        }elseif($article->method_article == 'Nhà đất cần thuê') {
                                            $searchMethod = 'nha-dat-can-thue';
                                        }elseif($article->method_article == 'Nhà đất bán') {
                                            $searchMethod = 'nha-dat-ban';
                                        }elseif($article->method_article == 'Nhà đất cho thuê') {
                                            $searchMethod = 'nha-dat-cho-thue';
                                        }
                                        ?>
                                        <a id="LeftMainContent__productList_lnkSimilar" rel="nofollow" href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$article->province_id}}/{{$article->district_id}}/-1/-1/-1/-1/-1/-1/-1">Xem thêm các tin khác tại khu vực này</a>
                                    </p>
                                    <div class="separable">
                                    </div>
                                    <script type="text/javascript">
                                        $('.p-title > h3 > a').each(function () {
                                            $(this).html($(this).html().replace(/đặc khu/ig, ''));
                                        });
                                        $('.p-main > .p-content > .p-main-text').each(function () {
                                            $(this).html($(this).html().replace(/đặc khu/ig, ''));
                                        })
                                    </script>
                                </div>
                            </div>
                            @endif
                            <div class="clear"></div>
                    </div>
                    <div class="clear"></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    @include('layouts.slider_bar_right')
@endsection
@section('footerElement')
    <div id="reportPopupContainer" class="modal fade" role="dialog" style="top: 50px;">
        <div class="verifyPopup modal-dialog">
            <!-- Modal content-->
            <div class="verifyPopupClose fa fa-close" onclick="closePopup()"></div>
            <div class="modal-content">
                <br/>
                <table border="0" cellpadding="5" cellspacing="0" width="100%">
                    <tbody><tr>
                        <td>Chú ý thông tin có dấu (<span style="color: red">*</span>) là bắt buộc
                        </td>
                    </tr>
                    <tr>
                        <td>Tên người gửi :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="txtSenderName" type="text" id="txtSenderName" style="width:90%;">
                            <span id="txtErrorSenderName" style="color:Red;display:none;">Vui lòng điền tên người gửi.</span>
                        </td>
                    </tr>
                    <tr>
                        <td><span style="color: red">*</span> Email người gửi :
                        </td>
                    </tr>
                    <tr>
                        <td><input name="txtSenderEmail" type="text" id="txtSenderEmail" style="width:90%;"><br>
                            <span id="txtErrorSenderEmail" style="color:Red;display:none;">Email không hợp lệ</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color: red">*</span> Lý do :
                            <select name="ddlReasons" id="ddlReasons" style="width:200px;">
                                <option value="">--- Lý do than phiền ---</option>
                                <option value="Tin sai chuyên mục.">Tin sai chuyên mục.</option>
                                <option value="Không có địa chỉ, số điện thoại người bán.">Không có địa chỉ, số điện thoại người bán.</option>
                                <option value="Không có thông tin về sản phẩm.">Không có thông tin về sản phẩm.</option>
                                <option value="Tiêu đề tin không dấu/có ký tự lạ.">Tiêu đề tin không dấu/có ký tự lạ.</option>
                                <option value="Đăng tin sai quy định">Đăng tin sai quy định</option>
                                <option value="Đăng tin khống.">Đăng tin khống.</option>
                            </select><br>
                            <span id="ddlErrorReasons" style="color:Red;display:none;">Bạn chưa chọn lý do</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color: red">*</span> Nội dung
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="txtContent" rows="2" cols="20" id="txtContent" style="height:100px;width:90%;"></textarea><br>
                            <span id="txtErrorContent" style="color:Red;display:none;">Bạn chưa nhập nội dung</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color: red">*</span> Mã an toàn
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="g-recaptcha" data-sitekey="{{env('NOCAPTCHA_SECRET')}}"></div>
                            <span id="errorCaptcha" style="color:Red;display:none;">Bạn chưa xác nhận mã an toàn</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding-top:10px;">
                            <input type="submit" name="btnSend" value="Gửi" onclick="sendReport()" id="btnSend" style="width:73px;">&nbsp;
                        </td>
                    </tr>
                    </tbody>
                </table>
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
        function changeSort(val) {
            window.location.href = window.location.origin + window.location.pathname + '?sort=' + val;
        }
        <?php
        if(isset($_SESSION['order_page_lease'])) {
        ?>
        document.getElementById('ddlSortReult').value = '<?php echo $_SESSION['order_page_lease'] ?>';
        <?php
        }
        ?>
        function report() {
            $("#reportPopupContainer").modal();
        }
        function sendReport() {
            $('#txtErrorSenderName').css('display', 'none');
            $('#txtErrorSenderEmail').css('display', 'none');
            $('#ddlErrorReasons').css('display', 'none');
            $('#txtErrorContent').css('display', 'none');
            $('#errorErrorCaptcha').css('display', 'none');
            if(!$('#txtSenderEmail').val() || $('#txtSenderEmail').val().length < 2) {
                $('#txtErrorSenderEmail').css('display', 'block').html('Vui lòng điền email.');
                return false;
            }
            if(!$('#ddlReasons').val() || $('#ddlReasons').val() == 0) {
                $('#ddlErrorReasons').css('display', 'block').html('Bạn chưa chọn lý do');
                return false;
            }
            if(!$('#txtContent').val()) {
                $('#txtErrorContent').css('display', 'block').html('Bạn chưa nhập nội dung');
                return false;
            }
            if(!grecaptcha.getResponse()) {
             $('#errorCaptcha').css('display', 'block').html('Bạn chưa xác nhận mã an toàn');
                return false;
            }

            $.ajax({
                url: '/report/tin_tuc_mua_ban_cho_thue',
                type: "POST",
                dataType: "json",
                data: {
                    name:  $('#txtSenderName').val(),
                    email:  $('#txtSenderEmail').val(),
                    reason:  $('#ddlReasons').val(),
                    content_report:  $('#txtContent').val(),
                    captcha: grecaptcha.getResponse(),
                    id_article:  <?php echo $article->id ?>,
                    method_report:  '<?php echo $article->method_article ?>',

                },
                beforeSend: function () {
                    if(loaded) return false;
                    loaded = true;
                },
                success: function(response) {
                    if(response.success) {
                        $('#reportPopupContainer').click();
                        $('#txtSenderName').val('');
                        $('#txtSenderEmail').val('');
                        $('#txtContent').val('');
                        grecaptcha.reset();
                        alertModal(response.message);
                    }else{
                        $('#' + response.data[0]).css('display', 'block').html(response.message);
                    }
                }
            });
        }
    </script>
@endsection