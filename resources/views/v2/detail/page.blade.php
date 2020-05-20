<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
?>
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
                                                    <div class="apus-col-12">
                                                        <div class="property-content">
                                                            <div id="property-section-address" class="property-section property-address">
                                                                <h3 id="reply-title" class="comment-reply-title">{{$page->title}}</h3>
                                                                <?php echo $page->content ?>
                                                            </div>
                                                        </div>
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
