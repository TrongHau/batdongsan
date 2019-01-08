<?php
use App\Library\Helpers;
?>
@extends('layouts.app')
@section('content')
    @include('layouts.top_search')
    <div class="div_2col">
        <div class="body-left">
            <div style="clear: both;">
            </div>
            <div class="container-default">
                <div id="ctl23_BodyContainer">
                    <div id="ctl23_ctl00_panelNewsDetails" class="contentDetail">
                        <h1 id="ctl23_ctl00_divArticleTitle" class="detailsView-title-style">{{$article->title}}</h1>
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
                        <div id="divContents" class="detailsView-contents-style detail-article-content"><p>
                            <?php echo $article->content ?>

                        </div>
                        <div class="stat detail-tools" ct="1" ac="2" cid="97296">
                            <a id="facebook" target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;t={{$article->title}}">
                                <img src="https://file4.batdongsan.com.vn/images/opt/btn-share-facebook.png"></a>
                            <a id="googleBookmark" target="_blank" rel="nofollow" href="https://plus.google.com/share?url={{url()->current()}}">
                                <img src="https://file4.batdongsan.com.vn/images/opt/btn-share-gplus.png"></a>
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