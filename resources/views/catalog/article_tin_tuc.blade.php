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
    @include('layouts.top_search')
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
                            <h1>{{$category->name}}</h1>
                        </div>
                        <div id="bannerQC">
                            <div class="adPosition" positioncode="BANNER_POSITION_HORIZONTAL_MAIN_CONTENT" style="" hasshare="True" hasnotshare="True"></div>
                        </div>
                        <div class="Main">
                            <div class="body-left">
                                <?php
                                $page = $article->links();
                                $article = $article->toArray();
                                ?>
                                @foreach($article['data'] as $key => $item)
                                    @if($key == 0 && $item['image'])
                                        <div id="ctl23_ctl00_panelCate" class="detailsView-title-style">
                                            <div class="font-title-list-news">
                                            </div>
                                        </div>
                                        <div class="tt-thumb-img">
                                            <a href="/{{$category->slug}}/{{$item['slug']}}">
                                                <img style="width:216px;height:152px" src="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}}" alt="{{$item['title']}}" class="bor_img">
                                            </a>&nbsp;&nbsp;</div>
                                        <div class="tt-thumb-cnt">
                                            <h2>
                                                <a class="link_blue" href="/{{$category->slug}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                            </h2>
                                            <div class="datetime">
                                                {{date('d/m/Y', strtotime($item['created_at']))}}
                                            </div>
                                            <p style="text-rendering:geometricPrecision;">
                                                <?php echo preg_replace("/[\r\n]+/", "<br/>", substr( $item['short_content'], 0, LIMIT_SHORT_CONTENT).'...')?></p>
                                        </div>
                                        <div class="clear line">
                                        </div>
                                    @else
                                        <div class="tintuc-row1 tintuc-list tc-tit">
                                            <div class="tc-img list-news-image-title">
                                                <a href="/{{$category->slug}}/{{$item['slug']}}">
                                                    <img class="bor_img" style="width: 132px; height: 100px;" alt="{{$item['title']}}" src="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}}">
                                                </a>&nbsp;&nbsp;</div>
                                            <h3>
                                                <a class="link_blue" href="/{{$category->slug}}/{{$item['slug']}}" title="{{$item['title']}}">
                                                    {{$item['title']}}
                                                </a>
                                            </h3>
                                            <div class="datetime">
                                                {{date('d/m/Y', strtotime($item['created_at']))}}
                                            </div>
                                            <p style="text-rendering:geometricPrecision;">
                                                <?php echo preg_replace("/[\r\n]+/", "<br/>", substr($item['short_content'], 0, LIMIT_SHORT_CONTENT).'...')?>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="clear">
                                </div>
                                <?php echo $page ?>
                            </div>
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

</script>
@endsection