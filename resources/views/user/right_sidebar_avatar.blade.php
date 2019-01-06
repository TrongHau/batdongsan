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
        padding-left: 25px;
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
        width: 108px;
        height: 108px;
        margin: 20px 60px;
        border-radius: 56px;
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
</style>
<div class="box-header">
    <h3>
        TRANG CÁ NHÂN</h3>
</div>
<div class="box-arround">
    <div class="useravatar">
        <img id="MainContent__userPage_imgAvatar" class="avatar" src="{{$mySelf->avatar ? Helpers::file_path($mySelf->id, AVATAR_PATH, true).$mySelf->avatar.'?t='.time() : '/imgs/default-user-avatar.jpg'}}">
        <label class="label_change_avatar" for="choose_user_avatar"><i class="material-icons" style="font-size: 18px;">photo_camera</i>&nbsp Thay đổi ảnh đại diện</label>
        <input type="file" hidden class="form-control-file" name="choose_user_avatar" id="choose_user_avatar">
        <input type="text" hidden  class="form-control-file" name="avatar_data" id="avatar_data" value="">

        <span id="MainContent__userPage_lblUserName" class="userfullname">{{$mySelf->name}}</span>

        <div id="MainContent__userPage_pnlUserPoint" class="userpoint_menu">

            <div class="userpoint_menu_level">

                <label>Tài khoản: {{$mySelf->UserType()->name}}</label>
            </div>
            <div class="userpoint_menu_point">
                <label style="font-size:16px; font-weight:bold;">{{number_format($mySelf->point_current)}}</label>
                <span style="font-size:14px; font-weight:normal;">&nbsp;điểm&nbsp;</span>
            </div>

        </div>
        <div class="userbalance">
            Tổng tin rao:
            <span id="MainContent__userPage_ltrBalance">{{number_format($mySelf->aritcle_total)}}</span><br>
            Tiền mặt:
            <span id="MainContent__userPage_ltrBalance">{{number_format($mySelf->cash_curent)}} vnđ</span><br>
            Tài khoản KM:
            <span id="MainContent__userPage_ltrPromotion1">{{number_format($mySelf->cash_promotion)}} vnđ</span><br>
        </div>

        <a id="MainContent__userPage_lnkDeposit" class="bluebotton" href="/trang-ca-nhan/uspg-paymentdeposit/method-nvpdomesticcard">Nạp tiền</a>
    </div>
    <div class="title">Quản lý thông tin cá nhân</div>
    <ul class="item">
        <li class="row-content">
            <a href="/thong-tin-ca-nhan/thay-doi-ca-nhan" title="Thay đổi thông tin cá nhân">
                Thay đổi thông tin cá nhân</a>
        </li>
        <li class="row-content">
            <a href="/thong-tin-ca-nhan/thay-doi-mat-khau" title="Thay đổi mật khẩu">
                Thay đổi mật khẩu</a>
        </li>


    </ul>
    <div class="title">Quản lý tin rao</div>
    <ul class="item">
        <li class="row-content">
            <a href="/thong-tin-ca-nhan" class="manage_article" title="Quản lý tin rao bán/cho thuê">
                Quản lý tin rao bán/cho thuê</a>
        </li>
        <li class="row-content">
            <a href="/quan-ly-tin/dang-tin-ban-cho-thue" title="Đăng tin rao bán/cho thuê">
                Đăng tin rao bán/cho thuê</a>
        </li>
        <li id="MainContent__userPage_menuAdNewsManager" class="row-content">
            <a href="/thong-tin-ca-nhan/quan-ly-mua-can-thue" title="Quản lý tin rao cần mua/cần thuê">Quản lý tin cần mua/cần thuê</a>
        </li>
        <li id="MainContent__userPage_menuPostAdNews" class="row-content">
            <a href="/quan-ly-tin/dang-tin-can-mua-can-thue" title="Đăng tin rao cần mua/cần thuê">Đăng tin cần mua/cần thuê</a>
        </li>
        <li id="MainContent__userPage_menuProductDraft" class="row-content">
            <a href="/trang-ca-nhan/tin-nhap" title="Quản lý tin nháp">
                Quản lý tin nháp</a>
        </li>

    </ul>
</div>
<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cắt sửa ảnh</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 text-center">
                        <div id="image_demo" style="width:470px; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success crop_image">Cắt ảnh</button>
                <button class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/croppie.js"></script>
<script>
    $(document).ready(function(){
        $('#choose_user_avatar').on('change', function(){
            $('#image_demo').html('');
            $('.modal-dialog').css("max-width", "500px")
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width:300,
                    height:300,
                    type:'circle' //square
                },
                boundary:{
                    width:300,
                    height:300
                },
                showZoomer: false,
                enableOrientation: true,
                mouseWheelZoom: '',
            });
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });
        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (response) {
                $('#uploadimageModal').modal('hide');
                $('#avatar_data').val(response);
                $('#MainContent__userPage_imgAvatar').attr("src", response);

                $.ajax({
                    url: "/thong-tin-ca-nhan/update_avatar",
                    type: "POST",
                    dataType: "json",
                    data: {avatar: response},
                    beforeSend: function () {
                    },
                    success: function(data) {
                        successModal(data.message);
                    }
                });
            })
        });
    });
    if(window.location.pathname == '/thong-tin-ca-nhan') {
        $('.manage_article').addClass('selected');
    }else{
        $('.white-background-new').find('.row-content').each(function( index ) {
            if($(this).find('a').attr('href') == window.location.pathname) {
                $(this).find('a').addClass('selected');
            }
        });
    }

</script>
