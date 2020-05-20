<?php
use App\Library\Helpers;
use Jenssegers\Agent\Agent;
$Agent = new Agent();
?>
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
                                            <div class="wrapper-breads-inner">
                                                <h2 class="bread-title">{{$category->name}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div id="main-content" class="col-md-12 col-sm-12 col-xs-12">
                                <main id="main" class="site-main content apus-properties-main" role="main">
                                    <div class="apus-properties-page-wrapper">
                                        <div class="tab-content">
                                            <div id="tab-properties-list" class="tab-pane active">
                                                <div class="property-box-archive type-row">
                                                    <?php
                                                    $page = $article->links();
                                                    $article = $article->toArray();
                                                    ?>
                                                    @foreach($article['data'] as $key => $item)
                                                            <div class="property-box property-box-wrapper property-box-list-row clearfix" data-markerid="marker-2086">
                                                                <div class="clearfix">
                                                                    <div class="property-box-left">
                                                                        <div class="property-box-image ">
                                                                            <a href="/{{$category->slug}}/{{$item['slug']}}">
                                                                                <img style="width: 150px;" src="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}}" class="attachment-property-thumbnail size-property-thumbnail wp-post-image" alt="" srcset="{{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}} 1920w, {{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}} 300w, {{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}} 768w, {{$item['image'] ? '/'.$item['image'] : PATH_LOGO_DEFAULT}} 1024w" sizes="(max-width: 1920px) 100vw, 1920px"> </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="property-box-content" style="margin-top: 10px">
                                                                        <div class="property-box-title-wrap">
                                                                            <div class="property-box-title">
                                                                                <h3 class="entry-title"><a href="/{{$category->slug}}/{{$item['slug']}}">{{$item['title']}}</a></h3>
                                                                                <div class="property-row-address"><?php echo preg_replace("/[\r\n]+/", "<br/>", mb_substr($item['short_content'], 0, LIMIT_SHORT_CONTENT_v2, "utf-8"))?></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="property-price-author clearfix">
                                                                            <div class="property-author pull-right">
                                                                                <a href="https://demoapus.com/homesweet/agents/linda-young/" class="agent-small-image-inner">
                                                                                    <span>{{date('d/m/Y', strtotime($item['created_at']))}}</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    @endforeach
                                                    <div class="clear">
                                                    </div>
                                                    <?php echo $page ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                            </div>
                        </div>
                    </div>
                </section> </div>
        </div>
    </div>
    <script>
        function changeSort(val) {
            window.location.href = window.location.origin + window.location.pathname + '?sort=' + val;
        }
        <?php
        if(isset($_SESSION['order_page_lease'])) {
        ?>
        document.getElementById('ddlSortReult').value = '<?php echo $_SESSION['order_page_lease'] ?>';
        <?php
        }
        ?>
    </script>
    @include('v2.layouts.footer')
    </body>
@endsection
