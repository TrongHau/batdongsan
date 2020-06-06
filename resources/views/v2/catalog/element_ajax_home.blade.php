<?php
use Jenssegers\Agent\Agent;
$page_per = PAGING_LIST_FEATURE_HOME;
$Agent = new Agent();
//if($Agent->isMobile()) {
//    $page_per = PAGING_LIST_FEATURE_HOME / 2;
//}
$allCount = count($articleForLease);
?>
@if($allCount > 0)
    @foreach($articleForLease as $item)
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
        <div class="isotope-item all SALE col-md-3 col-sm-4 {{$item->type_vip == ARTICLE_VIP_DIAMOND ? 'article_vip_diamond' : ($item->type_vip == ARTICLE_VIP_GOLD ? 'article_vip_gold' : ($item->type_vip == ARTICLE_VIP_SILVER ? 'article_vip_silver' : ($item->type_vip == ARTICLE_VIP_NORMAL ? 'article_vip_normal' : 'article_vip_none')))}}" data-category="SALE">
            <div class="property-box property-box-grid property-box-wrapper property_box_vip"
                 data-latitude="40.5795317"
                 data-longitude="-74.15020070000003"
                 data-markerid="marker-3076">
                <div class="property-box-image ">
                    <a href="/{{$link_url}}"
                       class="property-box-image-inner">
                        <div>
                            <img src="{{$img_}}" data-src="{{$img_}}" style="width: 262px; height: 175px" alt="{{$item['title']}}" class="attachment-homesweet-standard-size unveil-image"/>
                            @if($item->featured == 1)
                                <div class="status-featured"></div>
                            @endif
                        </div>
                    </a>
                </div>
                <div class="property-box-content">
                    <div class="property-box-title-wrap">
                        <div class="property-box-title">
                            <h3 class="entry-title title_home_ellipsis title_home_vip"><a href="/{{$link_url}}">{{$item['title']}}</a></h3>
                            <div class="property-row-address">
                                <i class="icon-ap_pin"
                                   aria-hidden="true"></i>
                                @if($item->district)
                                    <a class="link_blue"
                                       href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item->province_id}}/{{$item->district_id}}/-1/-1/-1/-1/-1/-1/-1"
                                       title="Bán nhà riêng tại {{$item->district}}">{{$item->district}}</a>,
                                @endif
                                @if($item->province)
                                    <a
                                            class="link_blue"
                                            href="/tim-kiem-nang-cao/{{$searchMethod}}/{{$item->province_id}}/-1/-1/-1/-1/-1/-1/-1/-1"
                                            title="Bán nhà riêng tại {{$item->province}}">{{$item->province}}</a>
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
    @if($allCount < $page_per)
        <script>
            $('.view-more-property').remove();
        </script>
    @endif
@else
    <script>
        $('.view-more-property').remove();
    </script>
@endif