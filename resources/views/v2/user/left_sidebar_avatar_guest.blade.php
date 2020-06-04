<?php
use App\Library\Helpers;
?>
<link rel="stylesheet" type="text/css" href="/css/croppie.css">
<style>
    .userpoint_menu {
        color: #055699;
    }
    .userpoint_menu .userpoint_menu_level, .userpoint_menu .userpoint_menu_point {
        display: block;
        text-align: center;
    }
    .userpoint_menu .userpoint_menu_level label {
        font-size: 12px;
        background-repeat: no-repeat;
        line-height: 25px;
        display: inline-block;
        font-weight: bold;
    }
    .userpoint_menu .userpoint_menu_point {
        font-size: 16px;
        font-weight: bold;
    }
    .userpoint_menu .userpoint_menu_point a {
        font-size: 20px;
        color: #055699;
        position: relative;
    }
    .userpoint_menu .userpoint_menu_point a:hover div {
        display: block;
    }
    .userpoint_menu .userpoint_menu_point a div {
        display: none;
        width: 200px;
        padding: 10px;
        top: 30px;
        left: -20px;
        position: absolute;
        background-color: #fff;
        border: 1px solid #ccc;
        border-box-shadow: -4px 2px 9px 0 rgba(0, 0, 0, 0.3);
        -moz-box-shadow: -4px 2px 9px 0 rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: -4px 2px 9px 0 rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        z-index: 100000;
    }
    .userpoint_menu .userpoint_menu_point a div::before {
        content: "";
        position: absolute;
        bottom: 100%;
        left: 18px;
        border-width: 10px;
        border-style: solid;
        border-color: transparent transparent #ccc transparent;
        z-index: -1;
    }
    .userpoint_menu .userpoint_menu_point a div ul {
        margin: 0 0 0 15px;
        padding: 0;
    }
    .userpoint_menu .userpoint_menu_point a div ul li {
        text-align: left;
    }
    .userpoint_menu .userpoint_menu_point a div ul li span {
        color: #666;
        font-size: 12px;
        line-height: 150%}
    .useravatar img.avatar {
        width: 128px;
        height: 128px;
        border-radius: 56px;
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .useravatar .userfullname {
        color: #069;
        font-size: 16px;
        text-transform: uppercase;
        text-align: center;
        font-family: Calibri;
        display: block;
        font-weight: bold;
    }
    .useravatar .usertype {
        text-align: center;
    }
    .useravatar .usertype span {
        color: #069;
    }
    .useravatar .userbalance {
        background: #f0f6f2;
        border: 1px dashed #cbd9ca;
        margin: 15px 10px;
        padding: 10px;
        text-align: right;
    }
    .useravatar .userbalance span {
        font-weight: bold;
    }
    .useravatar a.bluebotton {
        width: 110px;
        height: 35px;
        display: block;
        margin: 0 auto 15px auto;
        line-height: 35px;
    }
    .useravatar a.bluebotton {
        width: 110px;
        height: 35px;
        display: block;
        margin: 0 auto 15px auto;
        line-height: 35px;
    }
    .bluebotton {
        background-image: url('/imgs/bg-blue-button.png');
    }
    .bluebotton, .orangebutton {
        border-radius: 6px;
        margin: 0 5px;
        border: 0;
        height: 35px;
        color: #fff!important;
        font-size: 12px;
        font-weight: bold;
        min-width: 80px;
        text-align: center;
        padding: 0 15px;
    }
    .widget_agents_assigned_widget {
        border-color: #dfebee;
        border-style: solid;
        border-width: 1px 1px 1px 1px;
        padding: 0px 0px 25px 0px!important;
        margin-top: 25px!important;
    }
</style>

<div class="sidebar-detail sidebar sticky-this" style="width: 100%">
    <aside id="agents_assigned_widget-4" class="widget widget_agents_assigned_widget widget_profile_widget">
        <div class="type-small item-per-row-1">
            <div class="agents-container property-agents-wrapper clearfix">
                <div class="agent-small">
                    <div class="agent-small-inner title_sidebar_top_left">
                        ĐĂNG TIN
                    </div>
                    <div class="box-arround">
                        <ul class="item">
                            <br/>
                            <li class="row-content">
                                <a href="/guest/dang-tin-ban-cho-thue" title="Đăng tin rao bán/cho thuê">Đăng tin rao bán/cho thuê</a>
                            </li>
                            <li id="MainContent__userPage_menuAdNewsManager" class="row-content">
                                <a href="/guest/dang-tin-can-mua-can-thue" title="Quản lý tin rao cần mua/cần thuê">Đăng tin cần mua/cần thuê</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>

<script type="text/javascript" src="/js/croppie.js"></script>
<script>
    $('.row-content').each(function( index ) {
        if($(this).find('a').attr('href') == window.location.pathname) {
            $(this).find('a').addClass('selected');
        }
    });
</script>
