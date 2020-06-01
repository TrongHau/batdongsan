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
                                                        @if ($message = Session::get('success'))
                                                            <div class="alert alert-success" role="alert">
                                                                <?php echo $message ?>!
                                                            </div>
                                                        @endif
                                                        <div class="property-content">
                                                            <div id="property-section-address" class="property-section property-address">
                                                                <h3 id="reply-title" class="comment-reply-title">{{$page->title}}</h3>
                                                                <?php echo $page->content ?>
                                                            </div>
                                                        </div>
                                                        <form action="/lien-he" method="post" class="wpcf7-form" novalidate="novalidate">
                                                            <div class="form-contact" style="background: none">
                                                                <h3 class="title">Liên hệ đên chúng tôi</h3>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12">
                                                                        @if ($errors->has('title'))
                                                                            <div class="errorMessage" style="display: block;">{{ $errors->first('title') }}</div>
                                                                        @endif
                                                                        <span class="wpcf7-form-control-wrap website"><input type="text" name="title" value="{{old('title')}}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" required placeholder="Tiêu đề"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        @if ($errors->has('name'))
                                                                            <div class="errorMessage" style="display: block;">{{ $errors->first('name') }}</div>
                                                                        @endif
                                                                        <span class="wpcf7-form-control-wrap name"><input type="text" name="name" value="{{old('name')}}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Tên đại diện" required></span>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6">
                                                                        <span class="wpcf7-form-control-wrap phone"><input type="text" name="phone"size="40" value="{{old('phone')}}" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Sô điện thoại"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12">
                                                                        <span class="wpcf7-form-control-wrap"><input type="text" name="address" value="{{old('address')}}" size="300" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Địa chỉ"></span>
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    <span class="wpcf7-form-control-wrap message">
                                                                        @if ($errors->has('message'))
                                                                            <div class="errorMessage" style="display: block;">{{ $errors->first('message') }}</div>
                                                                        @endif
                                                                        <textarea name="message" cols="40" rows="10" value="{{old('message')}}" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Nội dung liên hệ"></textarea>
                                                                    </span>
                                                                    <br>
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <input type="submit" value="Gửi" class="wpcf7-form-control wpcf7-submit btn btn-submit"><span class="ajax-loader"></span>
                                                                </p></div>
                                                            <div class="wpcf7-response-output wpcf7-display-none"></div></form>
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
