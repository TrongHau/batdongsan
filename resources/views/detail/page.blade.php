<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
global $all_tin_tuc_moi;
$Agent = new Agent();
?>
@extends('layouts.app')
@if($Agent->isMobile())
@section('contentCSS')
    <link rel="stylesheet" type="text/css" href="/css/mobile.css">
@endsection
@endif
@section('content')
    @include('layouts.top_search')
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <div class="div_2col">
        <div class="body-left">
            <div style="clear: both;">
            </div>
            <div class="container-default">
                <div id="ctl23_BodyContainer">
                    <div id="ctl23_ctl00_panelNewsDetails" class="contentDetail">
                        <h1 id="ctl23_ctl00_divArticleTitle" class="detailsView-title-style">{{$page->title}}</h1>
                        <div id="divContents" class="detailsView-contents-style detail-article-content"><p>
                            <?php echo $page->content ?>
                            <div style="display: inline-flex; margin-top: 5px; position: absolute; margin-left: 10px;">
                                <a style="margin-top: 5px;" id="facebook" target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;t={{$page->title}}">
                                    <img style="height: 28px;" src="/imgs/btn-share-facebook.png"></a>
                                <div style="margin-top: 5px; margin-left: 8px" class="sharethis-inline-share-buttons"></div>
                                <a href="https://twitter.com/share?url={{url()->current()}}&amp;text=Bất%20Động%20Sản%20OOO&amp;hashtags=batdongsan" target="_blank">
                                    <img style="width: 28px; margin-top: 6px;" src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                                </a>
                                <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="4" data-color="white" data-customize=true><a class="zalo-share-button" href="javascript:void(0)" title="Chia sẻ {{$page->title}}"></a></div>
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

    </script>
@endsection