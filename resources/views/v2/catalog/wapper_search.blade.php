<div class="main-content-header-top ">
    <div class="container">
        <div class="properties-default-top-sidebar-wrapper">
            <aside id="filter_widget-13" class="widget widget_filter_widget">
                <div class="filter-property-form widget-filter-form horizontal1">
                    <div class="row top-search">
                        <div class="col-md-9">
                            <div class="row row-first">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="tu-khoa" type="text" id="tu-khoa" value="{{$key ?? ''}}" placeholder="Nhập từ khóa để tìm theo cụm từ" autocomplete="nope" class="txtKeyword form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control" name="filter-location" id="search-advance-method">
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
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group group-select">
                                        <select class="select-province form-control" id="select-province">
                                            <option value="-1">-- Chọn Tỉnh/Thành phố --</option>
                                            <option value="1">Hồ Chí Minh</option>
                                            <option value="2">Hà Nội</option>
                                            <option value="3">Đà Nẵng</option>
                                            <option value="4">Bình Dương</option>
                                            <option value="5">Đồng Nai</option>
                                            <option value="6">Khánh Hòa</option>
                                            <option value="7">Hải Phòng</option>
                                            <option value="8">Long An</option>
                                            <option value="9">Quảng Nam</option>
                                            <option value="10">Bà Rịa Vũng Tàu</option>
                                            <option value="11">Đắk Lắk</option>
                                            <option value="12">Cần Thơ</option>
                                            <option value="13">Bình Thuận  </option>
                                            <option value="14">Lâm Đồng</option>
                                            <option value="15">Thừa Thiên Huế</option>
                                            <option value="16">Kiên Giang</option>
                                            <option value="17">Bắc Ninh</option>
                                            <option value="18">Quảng Ninh</option>
                                            <option value="19">Thanh Hóa</option>
                                            <option value="20">Nghệ An</option>
                                            <option value="21">Hải Dương</option>
                                            <option value="22">Gia Lai</option>
                                            <option value="23">Bình Phước</option>
                                            <option value="24">Hưng Yên</option>
                                            <option value="25">Bình Định</option>
                                            <option value="26">Tiền Giang</option>
                                            <option value="27">Thái Bình</option>
                                            <option value="28">Bắc Giang</option>
                                            <option value="29">Hòa Bình</option>
                                            <option value="30">An Giang</option>
                                            <option value="31">Vĩnh Phúc</option>
                                            <option value="32">Tây Ninh</option>
                                            <option value="33">Thái Nguyên</option>
                                            <option value="34">Lào Cai</option>
                                            <option value="35">Nam Định</option>
                                            <option value="36">Quảng Ngãi</option>
                                            <option value="37">Bến Tre</option>
                                            <option value="38">Đắk Nông</option>
                                            <option value="39">Cà Mau</option>
                                            <option value="40">Vĩnh Long</option>
                                            <option value="41">Ninh Bình</option>
                                            <option value="42">Phú Thọ</option>
                                            <option value="43">Ninh Thuận</option>
                                            <option value="44">Phú Yên</option>
                                            <option value="45">Hà Nam</option>
                                            <option value="46">Hà Tĩnh</option>
                                            <option value="47">Đồng Tháp</option>
                                            <option value="48">Sóc Trăng</option>
                                            <option value="49">Kon Tum</option>
                                            <option value="50">Quảng Bình</option>
                                            <option value="51">Quảng Trị</option>
                                            <option value="52">Trà Vinh</option>
                                            <option value="53">Hậu Giang</option>
                                            <option value="54">Sơn La</option>
                                            <option value="55">Bạc Liêu</option>
                                            <option value="56">Yên Bái</option>
                                            <option value="57">Tuyên Quang</option>
                                            <option value="58">Điện Biên</option>
                                            <option value="59">Lai Châu</option>
                                            <option value="60">Lạng Sơn</option>
                                            <option value="61">Hà Giang</option>
                                            <option value="62">Bắc Kạn</option>
                                            <option value="63">Cao Bằng</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="#toggle_adv" class="toggle-adv text-theme visiable-line">
                                <i class="icon-ap_settings"></i> <span>Mở rộng</span>
                            </a>
                            <div class="visiable-line">
                                <button onclick="searchAdvance()" class="button btn btn-blue">Tìm Kiếm</button>
                            </div>
                        </div>
                    </div>
                    <div class="advance-fields clearfix" style="display: none;">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group group-select">
                                    <select class="form-control select-district">
                                        <option value="-1" class="advance-options">-- Chọn Quận/Huyện --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group group-select">
                                    <select class="form-control select-ward" >
                                        <option value="-1" class="advance-options">-- Chọn Phường/Xã --
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group group-select">
                                    <select class="form-control select-street">
                                        <option value="-1" class="advance-options">-- Chọn Đường/Phố --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">

                                <div class="form-group group-select">
                                    <select id="search-advance-area" class="form-control" style="min-width: 200px;">
                                        <option value="-1" class="advance-options" >-- Chọn diện tích --
                                        </option>
                                        <option value="0" class="advance-options" >Chưa xác định</option>
                                        <option value="1" class="advance-options" >&lt;= 30
                                            m2
                                        </option>
                                        <option value="2" class="advance-options" >30 - 50
                                            m2
                                        </option>
                                        <option value="3" class="advance-options" >50 - 80
                                            m2
                                        </option>
                                        <option value="4" class="advance-options" >80 - 100
                                            m2
                                        </option>
                                        <option value="5" class="advance-options" >100 - 150
                                            m2
                                        </option>
                                        <option value="6" class="advance-options" >150 - 200
                                            m2
                                        </option>
                                        <option value="7" class="advance-options" >200 - 250
                                            m2
                                        </option>
                                        <option value="8" class="advance-options" >250 - 300
                                            m2
                                        </option>
                                        <option value="9" class="advance-options" >300 - 500
                                            m2
                                        </option>
                                        <option value="10" class="advance-options" >&gt;= 500
                                            m2
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group group-select">
                                    <select class="form-control" id="search-advance-price">
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
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group group-select">
                                    <select id="search-advance-bed_room" class="form-control">
                                        <option value="-1" class="advance-options">-- Chọn số phòng ngủ --</option>
                                        <option value="0" class="advance-options">Không xác định </option>
                                        <option value="1" class="advance-options">1+</option>
                                        <option value="2" class="advance-options">2+</option>
                                        <option value="3" class="advance-options">3+</option>
                                        <option value="4" class="advance-options">4+</option>
                                        <option value="5" class="advance-options">5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group group-select">
                                    <select id="search-advance-toilet" class="form-control">
                                        <option value="-1" class="advance-options">-- Chọn số toilet --</option>
                                        <option value="0" class="advance-options">Không xác định </option>
                                        <option value="1" class="advance-options">1+</option>
                                        <option value="2" class="advance-options">2+</option>
                                        <option value="3" class="advance-options">3+</option>
                                        <option value="4" class="advance-options">4+</option>
                                        <option value="5" class="advance-options">5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group group-select">
                                    <select id="search-advance-ddlHomeDirection" class="form-control" >
                                        <option value="-1">-- Chọn hướng nhà --</option>
                                        <option value="KXĐ" class="advance-options">KXĐ</option>
                                        <option value="Đông" class="advance-options">Đông</option>
                                        <option value="Tây" class="advance-options">Tây</option>
                                        <option value="Nam" class="advance-options">Nam</option>
                                        <option value="Bắc" class="advance-options">Bắc</option>
                                        <option value="Đông-Bắc" class="advance-options">Đông-Bắc</option>
                                        <option value="Tây-Bắc" class="advance-options">Tây-Bắc</option>
                                        <option value="Tây-Nam" class="advance-options">Tây-Nam</option>
                                        <option value="Đông-Nam" class="advance-options">Đông-Nam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside> </div>
    </div>
</div>
<script>
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
                <?php
                if($district_id > 0 || $ward_id > 0 || $street_id > 0 || $area > 0 || $price > 0 || $bed_room > 0 || $toilet > 0 || $ddlHomeDirection > 0) {
                    ?>
                    $('.toggle-adv ').trigger("click");
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