<?php
global $province;
global $tintuc;
global $loikhuyen;
global $tuvanluat;
?>
@include('cache.province')
@include('cache.tintuc')
<div id="MainRight" class="col_right">
    <div id="TopLeftMainContent" class="col_left">
        <div class="home-search-box">
            <div class="tops">
                <hTopLeftMainContent2>Công cụ tìm kiếm</hTopLeftMainContent2>
            </div>
            <div class="contents">
                <div id="divOfSeach">
                    <div class="home-product-search">
                        <div id="searchArea">
                            <div class="comboboxs">
                                <div class="suggestTT" style="display: none;">

                                </div>
                            </div>
                            <div id="divCategoryRe" class="comboboxs advance-select-box">
                                <select id="search-advance-method" class="advance-options" style="min-width: 200px;">
                                    <option class="advance-options" value="-1">-- Chọn loại nhà đất --</option>
                                    <option class="advance-options" value="nha-dat-ban">- Nhà đất bán</option>
                                    <option class="advance-options" value="nha-dat-cho-thue">- Nhà đất cho thuê</option>
                                    <option class="advance-options" value="nha-dat-can-mua">- Nhà đất cần mua</option>
                                    <option class="advance-options" value="nha-dat-can-thue">- Nhà đất cần thuê</option>
                                    <option class="advance-options" value="ban-can-ho-chung-cu">- Bán căn hộ chung cư</option>
                                    <option class="advance-options" value="tat-ca-nha-ban">- Tất cả các loại nhà bán</option>
                                    <option class="advance-options" value="ban-nha-rieng">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà riêng </option>
                                    <option class="advance-options" value="ban-biet-thu-lien-ke">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán biệt thự, liền kề</option>
                                    <option class="advance-options" value="ban-nha-mat-pho">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà mặt phố</option>
                                    <option class="advance-options" value="tat-ca-dat-ban">- Tất cả các loại đất bán</option>
                                    <option class="advance-options" value="ban-dat-nen-du-an">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất nền dự án</option>
                                    <option class="advance-options" value="ban-dat">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất </option>
                                    <option class="advance-options" value="ban-trang-trai-khu-nghi-duong">- Bán trang trại, khu nghỉ dưỡng</option>
                                    <option class="advance-options" value="ban-kho-nha-xuong">- Bán kho, nhà xưởng</option>
                                    <option class="advance-options" value="ban-loai-bat-dong-san-khac">- Bán loại bất động sản khác</option>
                                </select>
                            </div>
                            <div id="divCity" class="comboboxs advance-select-box">
                                <select class="advance-options select-province" id="select-province" style="min-width: 200px;">
                                    <option value="-1">-- Chọn Tỉnh/Thành phố --</option>
                                    @foreach($province as $item)
                                        <option value="{{$item['id']}}">{{$item['_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="divDistrict" class="comboboxs advance-select-box" title="">
                                <select class="advance-options select-district" style="min-width: 200px;">
                                    <option value="-1" class="advance-options" style="min-width: 168px;">-- Chọn Quận/Huyện --</option>
                                </select>
                            </div>
                            <div id="divWard" class="comboboxs advance-select-box" title="">
                                <select class="advance-options select-ward" style="min-width: 200px;">
                                    <option value="-1" class="advance-options" style="min-width: 168px;">-- Chọn Phường/Xã --
                                    </option>
                                </select>
                            </div>
                            <div id="divStreet" class="comboboxs advance-select-box adv-search" title="">
                                <select class="advance-options select-street" style="min-width: 200px;">
                                    <option value="-1" class="advance-options" style="min-width: 168px;">-- Chọn Đường/Phố --</option>
                                </select>
                            </div>
                            <div id="divArea" class="comboboxs advance-select-box">
                                <select id="search-advance-area" class="advance-options" style="min-width: 200px;">
                                    <option value="-1" class="advance-options" style="min-width: 168px;">-- Chọn diện tích --
                                    </option>
                                    <option value="0" class="advance-options" style="min-width: 168px;">Chưa xác định</option>
                                    <option value="1" class="advance-options" style="min-width: 168px;">&lt;= 30
                                        m2
                                    </option>
                                    <option value="2" class="advance-options" style="min-width: 168px;">30 - 50
                                        m2
                                    </option>
                                    <option value="3" class="advance-options" style="min-width: 168px;">50 - 80
                                        m2
                                    </option>
                                    <option value="4" class="advance-options" style="min-width: 168px;">80 - 100
                                        m2
                                    </option>
                                    <option value="5" class="advance-options" style="min-width: 168px;">100 - 150
                                        m2
                                    </option>
                                    <option value="6" class="advance-options" style="min-width: 168px;">150 - 200
                                        m2
                                    </option>
                                    <option value="7" class="advance-options" style="min-width: 168px;">200 - 250
                                        m2
                                    </option>
                                    <option value="8" class="advance-options" style="min-width: 168px;">250 - 300
                                        m2
                                    </option>
                                    <option value="9" class="advance-options" style="min-width: 168px;">300 - 500
                                        m2
                                    </option>
                                    <option value="10" class="advance-options" style="min-width: 168px;">&gt;= 500
                                        m2
                                    </option>
                                </select>
                            </div>
                            <div id="divPrice" class="comboboxs advance-select-box">
                                <select class="advance-options" id="search-advance-price" style="min-width: 200px;">
                                    <option value="-1" class="advance-options">-- Chọn mức giá --</option>
                                    <option value="0" class="advance-options">Thỏa thuận</option>
                                    <option value="1" class="advance-options">&lt; 500 triệu</option>
                                    <option value="2" class="advance-options">500 - 800 triệu</option>
                                    <option value="3" class="advance-options">800 triệu - 1 tỷ</option>
                                    <option value="4" class="advance-options">1 - 2 tỷ</option>
                                    <option value="5" class="advance-options">2 - 3 tỷ</option>
                                    <option value="6" class="advance-options">3 - 5 tỷ</option>
                                    <option value="7" class="advance-options">5 - 7 tỷ</option>
                                    <option value="8" class="advance-options">7 - 10 tỷ</option>
                                    <option value="9" class="advance-options">10 - 20 tỷ</option>
                                    <option value="10" class="advance-options">20 - 30 tỷ</option>
                                    <option value="11" class="advance-options">&gt; 30 tỷ</option>
                                </select>
                            </div>

                            <div id="divBedRoom" class="comboboxs advance-select-box adv-search">
                                <select id="search-advance-bed_room" class="advance-options" style="min-width: 200px;">
                                    <option value="-1" class="advance-options" style="min-width: 168px;">-- Chọn số phòng ngủ --</option>
                                    <option value="0" class="advance-options" style="min-width: 168px;">Không xác định </option>
                                    <option value="1" class="advance-options" style="min-width: 168px;">1+</option>
                                    <option value="2" class="advance-options" style="min-width: 168px;">2+</option>
                                    <option value="3" class="advance-options" style="min-width: 168px;">3+</option>
                                    <option value="4" class="advance-options" style="min-width: 168px;">4+</option>
                                    <option value="5" class="advance-options" style="min-width: 168px;">5+</option>
                                </select>
                            </div>
                            <div id="divBedRoom" class="comboboxs advance-select-box adv-search">
                                <select id="search-advance-toilet" class="advance-options" style="min-width: 200px;">
                                    <option value="-1" class="advance-options" style="min-width: 168px;">-- Chọn số toilet --</option>
                                    <option value="0" class="advance-options" style="min-width: 168px;">Không xác định </option>
                                    <option value="1" class="advance-options" style="min-width: 168px;">1+</option>
                                    <option value="2" class="advance-options" style="min-width: 168px;">2+</option>
                                    <option value="3" class="advance-options" style="min-width: 168px;">3+</option>
                                    <option value="4" class="advance-options" style="min-width: 168px;">4+</option>
                                    <option value="5" class="advance-options" style="min-width: 168px;">5+</option>
                                </select>
                            </div>
                            <div id="divHomeDirection" class="comboboxs advance-select-box">
                                <select id="search-advance-ddlHomeDirection" class="advance-options" style="min-width: 200px;">
                                    <option value="-1" style="min-width: 168px;">-- Chọn hướng nhà --</option>
                                    <option value="KXĐ" class="advance-options" style="min-width: 168px;">KXĐ</option>
                                    <option value="Đông" class="advance-options" style="min-width: 168px;">Đông</option>
                                    <option value="Tây" class="advance-options" style="min-width: 168px;">Tây</option>
                                    <option value="Nam" class="advance-options" style="min-width: 168px;">Nam</option>
                                    <option value="Bắc" class="advance-options" style="min-width: 168px;">Bắc</option>
                                    <option value="Đông-Bắc" class="advance-options" style="min-width: 168px;">Đông-Bắc</option>
                                    <option value="Tây-Bắc" class="advance-options" style="min-width: 168px;">Tây-Bắc</option>
                                    <option value="Tây-Nam" class="advance-options" style="min-width: 168px;">Tây-Nam</option>
                                    <option value="Đông-Nam" class="advance-options" style="min-width: 168px;">Đông-Nam</option>
                                </select>
                            </div>
                        </div>
                        <div class="timkiems">
                            <input type="image" onclick="searchAdvance()" name="action" class="btnSearch" src="/imgs/timkiem.jpg">
                        </div>
                    </div>
                </div>
                <script>
                    function searchAdvance() {
                        if($('#search-advance-method').val() == -1) {
                            alertModal('Vui lòng chọn loại nhà đất tìm kiếm');
                            return false;
                        }
                        window.location.href = window.location.origin + '/tim-kiem-nang-cao/' + $('#search-advance-method').val()+ '/' + ($('.select-province').val() ?  $('.select-province').val() : -1) + '/' + ($('.select-district').val() ? $('.select-district').val() : -1) + '/' + ($('.select-ward').val() ? $('.select-ward').val() : -1) + '/' + ($('.select-street').val() ? $('.select-street').val() : -1) + '/' + $('#search-advance-area').val() + '/' + $('#search-advance-price').val() + '/' + $('#search-advance-bed_room').val() + '/' + $('#search-advance-toilet').val() + '/' + $('#search-advance-ddlHomeDirection').val();
                    }
                    <?php
                        if(isset($method)) {
                            if($province_id > 0) {
                                ?>
                                $(document).ready(function() {
                                    document.getElementById('select-province').value = '<?php echo $province_id ?>';
                                    getDistrict('<?php echo $province_id ?>', '<?php echo $district_id ?>', '<?php echo $ward_id ?>', '<?php echo $street_id ?>');
                                    <?php
                                    if($district_id > 0) {
                                    ?>
                                    getWard(' <?php echo $district_id ?>', ' <?php echo $ward_id ?>', '<?php echo $street_id ?>');
                                    <?php
                                    }
                                    ?>
                                });
                                <?php
                            }
                            ?>
                                document.getElementById('search-advance-method').value = '<?php echo $method ?>';
                                document.getElementById('search-advance-area').value = '<?php echo $area ?>';
                                document.getElementById('search-advance-price').value = '<?php echo $price ?>';
                                document.getElementById('search-advance-bed_room').value = '<?php echo $bed_room ?>';
                                document.getElementById('search-advance-toilet').value = '<?php echo $toilet ?>';
                                document.getElementById('search-advance-ddlHomeDirection').value = '<?php echo $ddlHomeDirection ?>';
                            <?php
                        }

                    ?>
                </script>
                <div style="display: none" id="divReSaler">
                    <div class="home-product-search">
                        <div id="searchArea">
                            <div id="divBrokerCategory" class="comboboxs advance-select-box" style="">
<span class="select-text" style="">
<span class="select-text-content" style="width: 75px;">--Chọn loại giao dịch--</span>
</span>
                                <input type="hidden" name="cmbCategory" id="hdBrokerCategory" value="0">
                                <div id="divBrokerCategoryOptions"
                                     class="advance-select-options advance-options" hddvalue="hdBrokerCategory"
                                     ddlid="divBrokerCategory" style="width: 200px;">
                                    <ul class="advance-options" style="min-width: 200px;">
                                        <li value="0" class="advance-options" style="min-width: 168px;">--Chọn loại
                                            giao dịch--
                                        </li>
                                        <li value="38" class="advance-options" style="min-width: 168px;">
                                            Nhà đất bán
                                        </li>
                                        <li value="49" class="advance-options" style="min-width: 168px;">
                                            Nhà đất cho thuê
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="timkiems">
                                <input type="image" name="action" class="btnSearch"
                                       src="/imgs/timkiem.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear: both; margin-bottom: 10px;">
        </div>
        <div style="clear:both;"></div>
        <div class="container-commom">
            <div id="ctl30_HeaderContainer" class="box-header">
                <div class="name_tit" align="center">
                    <h2 style="color: White;">Tin tức thị trường</h2>
                </div>
            </div>
            <div id="ctl30_BodyContainer" class="bor_box">
                <div style="text-align: center; padding-top: 5px;">
                </div>
                <div class="list">
                    <ul>
                    @foreach($tintuc[5] as $key => $item)
                        @if($key == 0)
                            @if($item['image'])
                                <div class="aligncenter"><a
                                            href="/{{$item['slug_category']}}/{{$item['slug']}}"><img
                                                style="width: 200px; height: 140px"
                                                src="/{{$item['image']}}"
                                                alt="{{$item['title']}}"
                                                title="{{$item['title']}}"></a></div>
                                <div style="display: block; margin: 5px 10px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">
                                    <a href="/{{$item['slug_category']}}/{{$item['slug']}}" style="color: #055699 !important; font-weight: bold;">{{$item['title']}}</a></div>
                            @else
                                <li>
                                    <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                            </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
            <div id="ctl30_FooterContainer">
            </div>
        </div>
        <div style="clear: both; margin-bottom: 10px;">
        </div>
        <div class="container-commom">
            <div id="ctl34_HeaderContainer" class="box-header">
                <div class="name_tit" align="center">
                    <h2 style="color: White;">Tư vấn luật</h2>
                </div>
            </div>
            <div id="ctl34_BodyContainer" class="bor_box">
                <div class="list">
                    <ul>
                        @foreach($tuvanluat as $key => $item)
                            @if($key == 0)
                                @if($item['image'])
                                    <div class="aligncenter"><a
                                                href="/{{$item['slug_category']}}/{{$item['slug']}}"><img
                                                    style="width: 200px; height: 140px"
                                                    src="/{{$item['image']}}"
                                                    alt="{{$item['title']}}"
                                                    title="{{$item['title']}}"></a></div>
                                    <div style="display: block; margin: 5px 10px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">
                                        <a href="/{{$item['slug_category']}}/{{$item['slug']}}" style="color: #055699 !important; font-weight: bold;">{{$item['title']}}</a></div>
                                @else
                                    <li>
                                        <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="ctl34_FooterContainer">
            </div>
        </div>
        <div style="clear: both; margin-bottom: 10px;">
        </div>
        <div class="container-commom">
            <div id="ctl38_HeaderContainer" class="box-header">
                <div class="name_tit" align="center">
                    <h2 style="color: White;">Lời khuyên</h2>
                </div>
            </div>
            <div id="ctl38_BodyContainer" class="bor_box">
                <div style="text-align: center; padding-top: 5px;">
                </div>
                <div class="list">
                    <ul>
                        @foreach($loikhuyen as $key => $item)
                            @if($key == 0)
                                @if($item['image'])
                                    <div class="aligncenter"><a
                                                href="/{{$item['slug_category']}}/{{$item['slug']}}"><img
                                                    style="width: 200px; height: 140px"
                                                    src="/{{$item['image']}}"
                                                    alt="{{$item['title']}}"
                                                    title="{{$item['title']}}"></a></div>
                                    <div style="display: block; margin: 5px 10px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">
                                        <a href="/{{$item['slug_category']}}/{{$item['slug']}}" style="color: #055699 !important; font-weight: bold;">{{$item['title']}}</a></div>
                                @else
                                    <li>
                                        <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="ctl38_FooterContainer">
            </div>
        </div>
        <div style="clear: both; margin-bottom: 10px;">
        </div>
        <div class="container-commom">
            <div id="ctl41_HeaderContainer" class="box-header">
                <h2 class="name_tit" align="center">Chính sách - Quản lý</h2>
            </div>
            <div id="ctl41_BodyContainer" class="bor_box">
                <div class="list">
                    <ul>
                        @foreach($tintuc[1] as $key => $item)
                            @if($key == 0)
                                @if($item['image'])
                                    <div class="aligncenter"><a
                                                href="/{{$item['slug_category']}}/{{$item['slug']}}"><img
                                                    style="width: 200px; height: 140px"
                                                    src="/{{$item['image']}}"
                                                    alt="{{$item['title']}}"
                                                    title="{{$item['title']}}"></a></div>
                                    <div style="display: block; margin: 5px 10px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">
                                        <a href="/{{$item['slug_category']}}/{{$item['slug']}}" style="color: #055699 !important; font-weight: bold;">{{$item['title']}}</a></div>
                                @else
                                    <li>
                                        <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="ctl41_FooterContainer">
            </div>
        </div>
        <div style="clear: both; margin-bottom: 10px;">
        </div>
        <div class="container-commom">
            <div id="ctl41_HeaderContainer" class="box-header">
                <h2 class="name_tit" align="center">Thông tin quy hoạch</h2>
            </div>
            <div id="ctl41_BodyContainer" class="bor_box">
                <div class="list">
                    <ul>
                        @foreach($tintuc[2] as $key => $item)
                            @if($key == 0)
                                @if($item['image'])
                                    <div class="aligncenter"><a
                                                href="/{{$item['slug_category']}}/{{$item['slug']}}"><img
                                                    style="width: 200px; height: 140px"
                                                    src="/{{$item['image']}}"
                                                    alt="{{$item['title']}}"
                                                    title="{{$item['title']}}"></a></div>
                                    <div style="display: block; margin: 5px 10px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">
                                        <a href="/{{$item['slug_category']}}/{{$item['slug']}}" style="color: #055699 !important; font-weight: bold;">{{$item['title']}}</a></div>
                                @else
                                    <li>
                                        <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="/{{$item['slug_category']}}/{{$item['slug']}}" title="{{$item['title']}}">{{$item['title']}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="ctl41_FooterContainer">
            </div>
        </div>
        <div style="clear: both; margin-bottom: 10px;">
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="clear"></div>
    <div id="BottomMainContent"></div>
    <div class="footer-banner">
        <div id="SubBottomLeftMainContent" style="float: left; width: 495px">
            <div class="adPosition" positioncode="BANNER_POSITION_BOTTOM1" style="" hasshare="True"
                 hasnotshare="True"></div>
            <div style="clear:both;"></div>
        </div>
        <div id="SubBottomRightMainContent" style="float: left; width: 495px; margin-left: 5px">
            <div class="adPosition" positioncode="BANNER_POSITION_BOTTOM2" style="" hasshare="True"
                 hasnotshare="True"></div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <style type="text/css">
        .footer-bottom-top-1 a {
            white-space: nowrap;
        }
    </style>
</div>