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

                        </div>
                        <div class="stat detail-tools" ct="1" ac="2" cid="97296">
                            <a id="facebook" target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;t={{$page->title}}">
                                <img style="height: 28px;" src="/imgs/btn-share-facebook.png"></a>
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