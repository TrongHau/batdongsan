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
@extends('layouts.app')
@section('content')
    @include('layouts.top_search')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <div class="div_2col">
        <div class="body-left">
            <div style="clear: both;">
            </div>
            <div class="container-default">
                <div id="ctl23_BodyContainer">
                    <div id="ctl23_ctl00_panelNewsDetails" class="contentDetail">
                        <h1 id="ctl23_ctl00_divArticleTitle" class="detailsView-title-style">{{$article->title}}</h1>
                        @if($article->category_id != 26)
                            <div id="ctl23_ctl00_divDate" class="date-first">{{date('d-m-Y', strtotime($article->created_at))}}</div>
                            <div id="ctl23_ctl00_palSubject">
                                @if($articleRelate)
                                    <div>
                                        <div class="subinart">
                                            @foreach($articleRelate as $item)
                                                <div class="artlist">
                                                    <a href="/{{$item->category->slug}}/{{$item->slug}}" class="line">{{$item->title}}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        <div id="divContents" class="detailsView-contents-style detail-article-content">
                            <?php echo $article->content ?>
                            <div class="prd-more-info">
                                <div style="margin-top: 15px;">Chia sẻ tin đăng này cho bạn bè:</div>
                                <div style="display: inline-flex; margin-top: 5px; position: absolute; margin-left: 10px;">
                                    <a style="margin-top: 5px;" id="facebook" target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;t={{$article->title}}">
                                        <img style="height: 28px;" src="/imgs/btn-share-facebook.png"></a>
                                    <div style="margin-top: 5px; margin-left: 8px" class="sharethis-inline-share-buttons"></div>
                                    <a href="https://twitter.com/share?url={{url()->current()}}&amp;text=Bất%20Động%20Sản%20OOO&amp;hashtags=batdongsan" target="_blank">
                                        <img style="width: 28px; margin-top: 6px;" src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                                    </a>
                                    <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="4" data-color="white" data-customize=true><a class="zalo-share-button" href="javascript:void(0)" title="Chia sẻ {{$article->music_title}}"></a></div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="clear" style="margin-bottom: 10px;">
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
        $('#divContents p').last().find('em').css( "text-align", "right" );
    </script>
@endsection