<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
?>
@if($Agent->isMobile())
@section('contentCSS')
    <link rel="stylesheet" type="text/css" href="/css/mobile_catalog.css">
@endsection
@endif
@extends('layouts.app')
@section('content')
    @include('layouts.top_search', ['titleArticle' => $titleArticle, 'key' => $key])
    <div class="div_2col">
        <div class="body-left">
            <div>
                <div class="SubTopContent">
                </div>
                <div class="SubTopContent">
                </div>
            </div>
            <div style="clear: both;">
            </div>
            <div class="container-default">
                <div>
                    <div class="product-list product-list-page" pagekey="afgYRJI2uSWSXQ70P/5TjQ==">
                        <div class="Title">
                            <h1>
                                {{$titleArticle->name}} tại Việt Nam</h1>
                            <div class="Footer">
                                Có <span class="greencolor"><strong>{{number_format($article->total())}}</strong></span> bất động sản.
                            </div>
                        </div>
                        <div id="bannerQC">
                            <div class="adPosition" positioncode="BANNER_POSITION_HORIZONTAL_MAIN_CONTENT" style="" hasshare="True" hasnotshare="True"></div>
                        </div>
                        <div class="Main">
                            <div class="Header">
                                <input type="hidden" name="ctl00$LeftMainContent$_productSearchResult$hddFilter" id="LeftMainContent__productSearchResult_hddFilter" value="all">
                                <div class="Repeat">
                                    <h2>{{$titleArticle->name}} tại Việt Nam</h2>
                                    <div class="order">
                                        <span>Sắp xếp theo: </span>
                                        <select name="ctl00$LeftMainContent$_productSearchResult$ddlSortReult" onchange="changeSort(this.value)" id="ddlSortReult">
                                            <option selected="selected" value="new">Tin mới nhất</option>
                                            <option value="price_asc">Giá thấp nhất</option>
                                            <option value="price_desc">Giá cao nhất</option>
                                            <option value="area_asc">Diện tích nhỏ nhất</option>
                                            <option value="area_desc">Diện tích lớn nhất</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clear">
                            </div>
                            @if($article->total() == 0)
                                <div style="text-align: center">Không có bài viết nào</div>
                            @else
                                <?php
                                $page = $article->links();
                                $article = $article->toArray();
                                ?>
                                @foreach($article['data'] as $item)
                                    <div class="vip3 search-productItem">
                                        <div class="p-title">
                                            <h3><a href="/{{$item['prefix_url'].'-bds-'.$item['id']}}" title="{{$item['title']}}" style="text-rendering: optimizelegibility;">{{$item['title']}}</a></h3>
                                        </div>
                                        <div class="p-main">
                                            <div class="p-main-image-crop">
                                                <a class="product-avatar" href="/{{$item['prefix_url'].'-bds-'.$item['id']}}" title="{{$item['title']}}">
                                                    <img class="product-avatar-img" src="{{$item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_BUY, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT }}" alt="{{$item['title']}}">
                                                </a>
                                            </div>
                                            <div class="p-content">
                                                <div class="p-main-text" style="text-rendering: optimizelegibility;"><?php echo preg_replace("/(\r?\n){2,}/", "<br/>", mb_substr($item['content_article'], 0, LIMIT_SHORT_CONTENT, "utf-8").'...')?> </div>
                                            </div>
                                            <div class="p-bottom-crop fix-p-bottom-crop">
                                                <?php
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
                                                <div class="floatleft">
                                                    Giá:
                                                    <span class="product-price">{{$item['price_real'] == 0 ? 'Thỏa thuận' : ($item['price_to'] ? ($item['price_from'] .' - '. $item['price_to']) : $item['price_from']) . ' '.$item['ddlPriceType']}}</span>&nbsp;
                                                    Diện tích:
                                                    <span class="product-area">{{($item['area_from'] && $item['area_to']) ? ($item['area_to'] ? ($item['area_from'] .' - '. $item['area_to']) : $item['area_from']) .' m²' : 'Chưa xác định'}}</span>&nbsp;
                                                    Quận/Huyện:
                                                    <span class="product-city-dist"><a href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item['province_id']}}/{{$item['district_id']}}/-1/-1/-1/-1/-1/-1/-1">{{$item['district']}}</a>,
                                                            <a href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item['province_id']}}/-1/-1/-1/-1/-1/-1/-1/-1">{{$item['province']}}</a></span>
                                                </div>
                                                <div class="floatright mar-right-10">{{date('d/m/Y', strtotime($item['created_at']))}}</div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="clear10"></div>
                                    </div>
                                @endforeach
                                <?php echo $page ?>
                            @endif
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
            window.location.href = window.location.origin + window.location.pathname + '?sort=' + val;
        }
        <?php
        if(isset($_SESSION['order_page_buy'])) {
        ?>
        document.getElementById('ddlSortReult').value = '<?php echo $_SESSION['order_page_buy'] ?>';
        <?php
        }
        ?>
    </script>
@endsection