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
    <meta name="keywords" content="{{$article->title}}">
    <meta name="description" content="{{$article->short_content}}">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="image_src" href="{{env('APP_URL') . ($article->image ? '/'.$article->image : PATH_LOGO_DEFAULT)}}" />
    <meta name="title" content="{{$article->title}}{{$tagRelate}}" />
    <meta property="og:image" content="{{env('APP_URL') . ($article->image ? '/'.$article->image : PATH_LOGO_DEFAULT)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:title" content="{{$article->title}}" />
    <meta property="og:description" content="{{strip_tags($article->short_content)}}" />
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="{{time()}}" />
@endsection
@section('contentCSS')
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
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
                                                                <?php echo $article->content ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="apus-col-4 sidebar-detail sidebar sticky-this" style="">
                                                        <aside id="apus_properties-5" class="widget widget_apus_properties"><h2 class="widget-title"><span>{{$category->name}} mới nhất</span></h2> <div class="widget-content">
                                                                <div class="properties-list-small">
                                                                    @foreach($articleRelate as $item)
                                                                    <div class="item">
                                                                        <div class="property-box property-box-list-small clearfix" data-markerid="marker-3076">
                                                                            <div class="property-box-left pull-left">
                                                                                <div class="property-box-image with-image">
                                                                                    <a href="/{{$category->slug}}/{{$item['slug']}}" class="property-box-image-inner ">
                                                                                        <div class="image-wrapper image-loaded"><img src="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}}" data-src="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}}" width="195" height="195" class="attachment-thumbnail unveil-image"></div> </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="property-box-content-right">
                                                                                <h3 class="entry-title"><a href="/{{$category->slug}}/{{$item['slug']}}">{{$item['title']}}</a></h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </aside>
                                                    </div>
                                                </div>
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

    @include('v2.layouts.footer')
    </body>
@endsection
