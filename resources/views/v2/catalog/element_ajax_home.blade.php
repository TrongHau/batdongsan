<?php
$allCount = count($articleForLease);
?>
@if($allCount > 0)
    @foreach($articleForLease as $item)
        <?php
        $img_ = $item['gallery_image'] ? Helpers::file_path($item['id'], PUBLIC_ARTICLE_LEASE, true).THUMBNAIL_PATH.json_decode($item['gallery_image'])[0] : THUMBNAIL_DEFAULT;
        $link_url = $item->prefix_url.'-bds-'.$item->id;
        $price = ($item->price_from != null && $item->price_to != null) ? ($item->price_to ? ($item->price_from. ' - ' .$item->price_to) : $item->price_from).' '.$item->ddlPriceType : ($item->price_real == 0 ? 'Thỏa thuận' : $item->price.' '.$item->ddlPriceType);
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
                        <div class="image-wrapper">
                            <img src="{{$img_}}" data-src="{{$img_}}" width="480" height="310" alt="{{$item['title']}}" class="attachment-homesweet-standard-size unveil-image"/>
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
                </div>
            </div>
        </div>
    @endforeach
    @if($allCount < PAGING_LIST_ARTICLE_HOME)
        <script>
            $('.view-more-property').remove();
        </script>
    @endif
@else
    <script>
        $('.view-more-property').remove();
    </script>
@endif