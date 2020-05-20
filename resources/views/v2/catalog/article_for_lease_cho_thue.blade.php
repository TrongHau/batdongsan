<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
?>
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
                                            <div class="wrapper-breads-inner">
                                                <h2 class="bread-title">{{$titleArticle->name}} tại {{$local ?? 'Việt Nam'}} </h2>
                                                <span>có {{number_format($article->total())}} bất động sản</span>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="pull-right">
                                <div class="mod-property pull-right">
                                    <div class="properties-sort">
                                        <div class="properties-sort-wrapper-inner">
                                            <span>Sắp xếp theo: </span>
                                            <select style="background: #f0f9fb;border: 1px solid #f0f9fb;" name="ctl00$LeftMainContent$_productSearchResult$ddlSortReult" onchange="changeSort(this.value)" id="ddlSortReult">
                                                <option selected="selected" value="new">Tin mới nhất</option>
                                                <option value="price_asc">Giá thấp nhất</option>
                                                <option value="price_desc">Giá cao nhất</option>
                                                <option value="area_asc">Diện tích nhỏ nhất</option>
                                                <option value="area_desc">Diện tích lớn nhất</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div id="main-content" class="col-md-12 col-sm-12 col-xs-12">
                                <main id="main" class="site-main content apus-properties-main" role="main">
                                    <div class="apus-properties-page-wrapper">
                                        <div class="tab-content">
                                            <div id="tab-properties-grid" class="tab-pane active">
                                                <div class="property-box-archive type-box">
                                                    <div class="row">
                                                        @if($article->total() == 0)
                                                            <div style="text-align: center">Không có bài viết nào</div>
                                                        @else
                                                            <?php
                                                            $page = $article->links();
                                                            $article = $article->toArray();
                                                            ?>
                                                            @foreach($article['data'] as $item)
                                                                <?php
                                                                $img_ = $item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT;
                                                                $link_url = $item['prefix_url'].'-bds-'.$item['id'];
                                                                $price = $item['price_real'] == 0 ? 'Thỏa thuận' : ($item['price_to'] ? ($item['price_from'] .' - '. $item['price_to']) : $item['price_from']) . ' '.$item['ddlPriceType'];
                                                                $area = ($item['area_from'] && $item['area_to']) ? ($item['area_to'] ? ($item['area_from'] .' - '. $item['area_to']) : $item['area_from']) .' m²' : 'Chưa xác định';
                                                                if($item['method_article'] == 'Nhà đất cần mua') {
                                                                    $searchMethod = 'nha-dat-can-mua';
                                                                }elseif($item['method_article'] == 'Nhà đất cần thuê') {
                                                                    $searchMethod = 'nha-dat-can-thue';
                                                                }elseif($item['method_article']== 'Nhà đất bán') {
                                                                    $searchMethod = 'nha-dat-ban';
                                                                }elseif($item['method_article'] == 'Nhà đất cho thuê') {
                                                                    $searchMethod = 'nha-dat-cho-thue';
                                                                }
                                                                ?>
                                                                <div class="isotope-item all SALE col-md-3 col-sm-4" data-category="SALE">
                                                                    <div class="property-box property-box-grid property-box-wrapper"
                                                                         data-latitude="40.5795317"
                                                                         data-longitude="-74.15020070000003"
                                                                         data-markerid="marker-3076">
                                                                        <div class="property-map-content-wrapper hidden">
                                                                            <div class="property-map-content">
                                                                                <div class="infobox"><a
                                                                                            class="infobox-image"
                                                                                            href="/{{$link_url}}"><img
                                                                                                width="1920" height="800"
                                                                                                src="{{$img_}}"
                                                                                                class="attachment-property-thumbnail size-property-thumbnail wp-post-image"
                                                                                                alt="{{$item['title']}}"
                                                                                                srcset="{{$img_}} 1920w, {{$img_}} 300w, {{$img_}} 768w, {{$img_}} 1024w"
                                                                                                sizes="(max-width: 1920px) 100vw, 1920px"/>
                                                                                        <div class="infobox-content-price">$
                                                                                            {{$price}}
                                                                                        </div>
                                                                                    </a>
                                                                                    <div class="infobox-content">
                                                                                        <div class="infobox-content-title">
                                                                                            <a href="/{{$link_url}}">{{$item['title']}}</a></div>
                                                                                        <div class="infobox-content-body">
                                                                                            <div class="infobox-content-body-location">
                                                                                                @if($item['district'])
                                                                                                    <a href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item['province_id']}}/{{$item['district_id']}}/-1/-1/-1/-1/-1/-1/-1">{{$item['district']}}</a>,
                                                                                                @endif
                                                                                                @if($item['province'])
                                                                                                    <a href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item['province_id']}}/-1/-1/-1/-1/-1/-1/-1/-1">{{$item['province']}}</a>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="property-map-marker">
                                                                                <div class="marker marker-3076">
                                                                                    <div class="marker-inner"><img src="wp-content/uploads/2017/08/icon-home.png" alt=""></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="property-box-image ">
                                                                            <a href="/{{$link_url}}"
                                                                               class="property-box-image-inner">
                                                                                <div>
                                                                                    <img src="{{$img_}}" style="{{$Agent->isMobile() ? '' : 'width: 262px; height: 175px'}}" data-src="{{$img_}}" width="480" height="310" alt="{{$item['title']}}" class="attachment-homesweet-standard-size unveil-image"/>
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
                                                                                        @if($item['district'])
                                                                                            <a href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item['province_id']}}/{{$item['district_id']}}/-1/-1/-1/-1/-1/-1/-1">{{$item['district']}}</a>,
                                                                                        @endif
                                                                                        @if($item['province'])
                                                                                            <a href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item['province_id']}}/-1/-1/-1/-1/-1/-1/-1/-1">{{$item['province']}}</a>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="property-box-price text-theme" style="display: contents;">{{$price}}</div>
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
                                                            <?php echo $page ?>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                            </div>
                        </div>
                    </div>
                </section> </div>
        </div>
    </div>
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
    </script>
    @include('v2.layouts.footer')
    </body>
@endsection
