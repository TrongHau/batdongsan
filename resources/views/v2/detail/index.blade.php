<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
global $location_district_article_lease;
?>
@include('cache.location_district_article_lease')
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
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/slidershow.css">
@endsection
@extends('v2.layouts.app')
@section('content')
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
                <section id="main-container" class="main-content  inner">
                    @include('v2.catalog.wapper_search')
                    <div class="container">
                        <div class="main-content-header-middle clearfix">
                            <div class="pull-left">
                                <section id="apus-breadscrumb" class="apus-breadscrumb">
                                    <div class="clearfix">
                                        <div class="wrapper-breads">
                                            <br/>
                                            <div class="container" style="padding: 0px">
                                                <div class="entry-content sticky-v-wrapper">
                                                    <div class="apus-col-8">
                                                        <div class="property-content">
                                                            <div id="property-section-address" class="property-section property-address">
                                                                <h3 id="reply-title" class="comment-reply-title">{{$article->title}}</h3>
                                                                <i class="icon-ap_pin" aria-hidden="true"></i> {{$article->address}}
                                                                <br/>
                                                                <span style="display: inline-block;"><span class="gia-title mar-right-15">
                                                                <b>
                                                                    @if($typeOf == 'lease')
                                                                        Giá: </b><strong class="color-red-price detail-article-for">{{($article->ddlPriceType == 'thỏa thuận' || !$article->price) ? 'Thỏa thuận' : ($article->price.' '.$article->ddlPriceType)}}&nbsp;</strong>
                                                                        </span>
                                                                        <span class="gia-title">
                                                                        <b>
                                                                        Diện tích:</b>
                                                                        <strong class="color-red-price detail-article-for">{{$article->area ? $article->area.' m²' : 'Chưa xác định'}}</strong>
                                                                    @else
                                                                        Giá: </b><strong class="color-red-price detail-article-for">{{($article->price_from && $article->price_to) ? $article->price_from .' - '. $article->price_to . ' '.$article->ddlPriceType : ($article->price_from ? $article->price_from . ' ' . $article->ddlPriceType : 'Thỏa thuận')}}</strong>
                                                                        </span>
                                                                        <span class="gia-title">
                                                                        <b>
                                                                        Diện tích:</b>
                                                                        <strong class="color-red-price detail-article-for">{{($article->area_from && $article->area_to) ? $article->area_from .' - '. $article->area_to .' m²' : ($article->area_from ? $article->area_from . ' m²' : 'Chưa xác định')}}</strong>
                                                                    @endif

                                                                </span>
                                                                </span>
                                                            </div>
                                                            <div id="property-section-description" class="property-section property-description">
                                                                <h3>Thông tin mô tả</h3>
                                                                <p><?php echo str_replace("\r\n", '<br/>', $article->content_article) ?></p>
                                                            </div>
                                                            @if($article->gallery_image)
                                                            <div id="property-section-stats_graph" class="property-section property-page_views" style="padding-bottom: 100px;">
                                                                <h3>Thông tin hình ảnh</h3>
                                                                <div class="page_views-wrapper">
                                                                    <div class="slideshow-container">
                                                                        <?php
                                                                        $preFixImage = $typeOf == 'lease' ? PUBLIC_ARTICLE_LEASE : PUBLIC_ARTICLE_BUY;
                                                                        $gallery = json_decode($article->gallery_image);
                                                                        $MaxImgs = count($gallery);
                                                                        ?>
                                                                        @foreach($gallery as $key => $item)
                                                                            <div class="mySlides fade">
                                                                                <div class="numbertext">{{++$key}} / {{$MaxImgs}}</div>
                                                                                <img src="{{Helpers::file_path($article->id, $preFixImage, true).$item}}" style="width:100%; height: 502px;">
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
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <div id="property-section-facilities" class="property-section property-public-facilities">
                                                                <h3>Đặc điểm bất động sản</h3>
                                                                <div class="property-section-detail">
                                                                    <ul class="columns-gap">
                                                                        <li><span>Loại tin rao:</span> {{$article->method_article}}</li>
                                                                        @if($article->facade)
                                                                        <li><span>Mặt tiền (m):</span> {{$article->facade}}</li>
                                                                        @endif
                                                                        @if($article->land_width)
                                                                            <li><span> Đường vào (m):</span> {{$article->land_width}}</li>
                                                                        @endif
                                                                        @if($article->ddlHomeDirection)
                                                                            <li><span>Hướng nhà:</span> {{$article->ddlHomeDirection}}</li>
                                                                        @endif
                                                                        @if($article->ddl_bacon_direction)
                                                                            <li><span>Hướng ban công:</span> {{$article->ddl_bacon_direction}}</li>
                                                                        @endif
                                                                        @if($article->floor)
                                                                            <li><span>Số tầng:</span> {{$article->floor}}</li>
                                                                        @endif
                                                                        @if($article->bed_room)
                                                                            <li><span>Số phòng ngủ:</span> {{$article->bed_room}}</li>
                                                                        @endif
                                                                        @if($article->toilet)
                                                                            <li><span>Số toilet:</span> {{$article->toilet}}</li>
                                                                        @endif
                                                                        @if($article->furniture)
                                                                            <li><span>Nội thất:</span> {{$article->furniture}}</li>
                                                                        @endif
                                                                        @if($article->floor)
                                                                            <li><span>Số tầng:</span> {{$article->floor}}</li>
                                                                        @endif
                                                                        <li><span>Mã tin đăng:</span> {{$article->id}}</li>
                                                                        <li><span>Loại tin đăng:</span> {{$article->type_vip == ARTICLE_VIP_DIAMOND ? 'VIP Kim Cương' : ($article->type_vip == ARTICLE_VIP_GOLD ? 'VIP Vàng' : ($article->type_vip == ARTICLE_VIP_SILVER ? 'VIP Bạc' : ($article->type_vip == ARTICLE_VIP_NORMAL ? 'Tin Vip Thường' : 'Thường')))}}</li>
                                                                        <li><span>Ngày đăng:</span> {{date('d-m-Y', strtotime($article->created_at))}}</li>
                                                                        <li><span>Hết hạn tin:</span> {{date('d-m-Y', $article->expired_post)}}</li>
                                                                    </ul>
                                                                    <div style="margin-top: 5px;display: contents;"><b>Chia sẻ</b> tin đăng này cho bạn bè:</div>
                                                                    <div style="display: inline-flex; margin-left: 38px">
                                                                        <a style="margin-top: 5px;" id="facebook" target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;t={{$article->title}}">
                                                                            <img style="height: 28px;" src="/imgs/btn-share-facebook.png"></a>
                                                                        <div style="margin-top: 5px; margin-left: 8px" class="sharethis-inline-share-buttons"></div>
                                                                        <a href="https://twitter.com/share?url={{url()->current()}}&amp;text=Bất%20Động%20Sản%20OOO&amp;hashtags=batdongsan" target="_blank">
                                                                            <img style="width: 28px; margin-top: 6px;" src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                                                                        </a>
                                                                        <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="4" data-color="white" data-customize=true><a class="zalo-share-button" href="javascript:void(0)" title="Chia sẻ {{$article->music_title}}"></a></div>
                                                                    </div>
                                                                    <div class="pm-bottom">
                                                                        <div>
                                                                            <b>
                                                                                Lưu ý
                                                                            </b>
                                                                            Quý vị đang xem nội dung tin rao "{{$article->title}}". Mọi thông tin liên quan tới tin rao này là do người đăng tin chịu trách nhiệm. Chúng tôi luôn cố gắng hết sức để có chất lượng tin rao tốt nhất nhưng chúng tôi không đảm bảo và không chịu trách nhiệm về bất kỳ nội dung nào liên quan tới tin rao này.
                                                                            Khi Quý vị phát hiện trường hợp tin rao không hợp lệ như trùng lặp, thông tin sai hoặc không đúng thực tế,... ngay lập tức xin hãy <a class="openFancy fancybox.iframe" onclick="report()" href="javascript:void(0)" rel="nofollow">thông báo cho chúng tôi.</a>.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="apus-col-4 sidebar-detail sidebar sticky-this" style="">
                                                        <aside id="agents_assigned_widget-4" class="widget widget_agents_assigned_widget">
                                                            <div class="type-small item-per-row-1">
                                                                <div class="agents-container property-agents-wrapper clearfix">
                                                                    <div class="agent-small">
                                                                        <div class="agent-small-inner">
                                                                            <h3 style="margin-top: 0px">Liên Hệ</h3>
                                                                            <hr style="margin-top: 5px; margin-bottom: 10px;" />
                                                                            <?php
                                                                            $avatarArticleUser = Helpers::file_path($article->user_id, AVATAR_PATH, true).$article->user_id.'.png';
                                                                            ?>
                                                                            @if(file_exists(public_path() . $avatarArticleUser))
                                                                                <div class="customer-avatar">
                                                                                    <img width="80px" src="{{$avatarArticleUser}}">
                                                                                </div>

                                                                                <div class="agent-small-image">
                                                                                        <img width="263" height="260" src="{{$avatarArticleUser}}" class="attachment-property-thumbnail size-property-thumbnail wp-post-image" alt="" srcset="{{$avatarArticleUser}} 263w, {{$avatarArticleUser}} 42w" sizes="(max-width: 263px) 100vw, 263px">
                                                                                </div>
                                                                            @endif
                                                                            <div class="agent-small-content">
                                                                                <h3 class="agent-small-title">
                                                                                   {{$article->contact_name}}
                                                                                </h3>
                                                                                @if($article->contact_email)
                                                                                <div class="agent-meta">
                                                                                    <div class="agent-small-email">
                                                                                        <i class="icon-ap_email"></i>
                                                                                        <a>{{$article->contact_email}}</a>
                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <div class="agent-small-phone">
                                                                                <i class="icon-ap_phone"></i>{{$article->contact_phone}}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </aside>
                                                        @if($article->province_id > 0 && isset($location_district_article_lease[$article->province_id]))
                                                        <aside id="agents_assigned_widget-4" class="widget widget_agents_assigned_widget">
                                                            <div class="type-small item-per-row-1">
                                                                <div class="agents-container property-agents-wrapper clearfix">
                                                                    <div class="agent-small">
                                                                        <div class="agent-small-inner">
                                                                            <h3 style="margin-top: 0px">Tin Rao Bán Tại {{$article->province}}</h3>
                                                                            <hr style="margin-top: 5px; margin-bottom: 10px;" />
                                                                            <ul style="font-size: 16px; list-style: none; padding-left: 0px;">
                                                                                @foreach($location_district_article_lease[$article->province_id] as $item)
                                                                                <li><a href="/tim-kiem-nang-cao/nha-dat-ban/{{$article->province_id}}/{{$item['district_id']}}/-1/-1/-1/-1/-1/-1/-1">{{$item['district']}}</a> ({{$item['total']}})</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </aside>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if(count($relateArticle))
                                                <div class="property-similar-properties widget">
                                                    <h3 class="widget-title"><span>Tin rao {{$article->method_article}}</span> tại {{$article->district}}</h3>
                                                    <div class="row">
                                                        @foreach($relateArticle as $item)
                                                            <?php
                                                            $img_ = $item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT;
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
                                                            <div class="isotope-item all SALE col-md-3 col-sm-4" data-category="SALE">
                                                                <div class="property-box property-box-grid property-box-wrapper"
                                                                     data-latitude="40.5795317"
                                                                     data-longitude="-74.15020070000003"
                                                                     data-markerid="marker-3076">
                                                                    <div class="property-box-image ">
                                                                        <a href="/{{$link_url}}"
                                                                           class="property-box-image-inner">
                                                                            <div>
                                                                                <img src="{{$img_}}" data-src="{{$img_}}" style="width: 262px; height: 175px" alt="{{$item['title']}}" class="attachment-homesweet-standard-size unveil-image"/>
                                                                                @if($item['featured'] == 1)
                                                                                    <div class="status-featured"></div>
                                                                                @endif
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <div class="property-box-content">
                                                                        <div class="property-box-title-wrap">
                                                                            <div class="property-box-title">
                                                                                <h3 class="entry-title title_home_ellipsis"><a href="/{{$link_url}}">{{$item['title']}}</a></h3>
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
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section> </div>
        </div>
    </div>


    <div id="reportPopupContainer" class="modal fade" role="dialog">
        <div class="verifyPopup modal-dialog" style="padding-bottom: 10px; margin-top: 30px">
            <!-- Modal content-->
                <div class="modal-body">
                    <div border="0" cellpadding="5" cellspacing="0" width="100%">
                        <div>
                            <div>Chú ý thông tin có dấu (<span style="color: red">*</span>) là bắt buộc
                            </div>
                        </div>
                        <div>
                            <div>Tên người gửi :
                            </div>
                        </div>
                        <div>
                            <div>
                                <input name="txtSenderName" type="text" id="txtSenderName" style="width:90%;">
                                <span id="txtErrorSenderName" style="color:Red;display:none;">Vui lòng điền tên người gửi.</span>
                            </div>
                        </div>
                        <div>
                            <div><span style="color: red">*</span> Email người gửi :
                            </div>
                        </div>
                        <div>
                            <div><input name="txtSenderEmail" type="text" id="txtSenderEmail" style="width:90%;"><br>
                                <span id="txtErrorSenderEmail" style="color:Red;display:none;">Email không hợp lệ</span>
                            </div>
                        </div>
                        <div>
                            <div>
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
                            </div>
                        </div>
                        <div>
                            <div>
                                <span style="color: red">*</span> Nội dung
                            </div>
                        </div>
                        <div>
                            <div>
                                <textarea name="txtContent" rows="2" cols="20" id="txtContent" style="height:100px;width:90%;"></textarea><br>
                                <span id="txtErrorContent" style="color:Red;display:none;">Bạn chưa nhập nội dung</span>
                            </div>
                        </div>
                        <div>
                            <div>
                                <span style="color: red">*</span> Mã an toàn
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="g-recaptcha" data-sitekey="{{env('NOCAPTCHA_SECRET')}}"></div>
                                <span id="errorCaptcha" style="color:Red;display:none;">Bạn chưa xác nhận mã an toàn</span>
                            </div>
                        </div>
                        <div>
                            <td style="text-align: center; padding-top:10px;">
                                <input type="submit" name="btnSend" value="Gửi" onclick="sendReport()" id="btnSend" style="width:73px;">&nbsp;
                            </td>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
            </div>

        </div>
    </div>
    <style>
        .page_views-wrapper .fade {
            opacity: 1;
        }


    </style>
    @include('v2.layouts.footer')
    </body>
@endsection
@section('contentJS')
    <script>
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
