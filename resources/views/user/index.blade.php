<?php
use App\Library\Helpers;
$mySelf = Auth::user();
?>
@extends('layouts.app')
@section('content')
    <div class="container-default">
        <div>
            <script src="https://content.batdongsan.com.vn/Modules/Project/Scripts/Common.js" type="text/javascript"></script>
            <link rel="stylesheet" type="text/css" href="https://content.batdongsan.com.vn/trang-ca-nhan/css/userpage2016.css?v=20181218" media="all">
            <div id="content-user">
                <input type="hidden" name="ctl00$MainContent$_userPage$hdfUserId1" id="hdfUserId1" value="1007909">
                <div class="has-bg-user">
                    <div id="column-left-user" style="width: 25%; float: left">
                        <div id="usercp">
                            <div class="white-background-new">
                                @include('user.right_sidebar_avatar', ['mySelf' => $mySelf])
                            </div>
                        </div>

                    </div>
                    <div id="column-no-right-user" style="width: 75%; float: left">

                        <style type="text/css">
                            .tblKM {
                                width: 750px;
                                border-collapse: collapse;
                            }
                            .tblKM tr:hover {
                                background-color: #cdcdcd;
                            }
                            .tblKM td {
                                padding: 3px;
                            }
                            .tblKM th {
                                padding: 3px;
                                font-size: 14px;
                                font-weight: bold;
                            }
                            .tblKM tr td:last-child {
                                text-align: right;
                            }
                        </style>
                        <div class="aligncenter">

                        </div>

                        <div class="moduletitle">
                            Quản lý tin rao bán, cho thuê
                        </div>
                        <table style="width: 100%; margin-top: 20px;" class="t-4-c">
                            <tbody>
                            <tr>
                                <td class="colorblue">Từ ngày</td>
                                <td class="colorblue">Đến ngày</td>
                                <td class="colorblue">Loại tin</td>
                                <td class="colorblue">Trạng thái</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="advance-control">
                                        <input name="ctl00$MainContent$_userPage$ctl00$txtFromDate" type="text" value="22/06/2018" id="txtFromDate" class="hasDatepicker">
                                        <span class="select-text">
<span class="select-text-content">22/06/2018</span>
</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="advance-control">
                                        <input name="ctl00$MainContent$_userPage$ctl00$txtToDate" type="text" value="23/12/2018" id="txtToDate" class="hasDatepicker">
                                        <span class="select-text">
<span class="select-text-content">23/12/2018</span>
</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="advance-control">
<span class="select-text">
<span class="select-text-content">Chọn loại tin</span>
</span>
                                        <select name="ctl00$MainContent$_userPage$ctl00$ddlVipType" id="ddlVipType">
                                            <option selected="selected" value="7">Chọn loại tin</option>
                                            <option value="0">Tin VIP đặc biệt</option>
                                            <option value="1">Tin VIP 1</option>
                                            <option value="2">Tin VIP 2</option>
                                            <option value="3">Tin VIP 3</option>
                                            <option value="4">Tin Ưu Đãi</option>
                                            <option value="5">Tin Thường</option>

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="advance-control">
                                        <select name="ctl00$MainContent$_userPage$ctl00$DropDownList2" id="DropDownList2">
                                            <option selected="selected" value="0">Tất cả</option>
                                            <option value="1">Còn hạn</option>

                                        </select>
                                        <span class="select-text">
<span class="select-text-content">Tất cả</span>
</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="colorblue">Mã tin</td>
                            </tr>
                            <tr>
                                <td>
                                    <input name="ctl00$MainContent$_userPage$ctl00$txtMaTin" type="text" id="MainContent__userPage_ctl00_txtMaTin" class="keycode">
                                </td>
                                <td colspan="3">
                                    <input type="submit" name="ctl00$MainContent$_userPage$ctl00$btnSearch" value="Tìm kiếm" onclick="doSearch();" id="MainContent__userPage_ctl00_btnSearch" class="timkiem" autopostback="true">
                                    <span class="colorboldblue"><strong>(Lưu ý khi nhập mã tin thì các bộ lọc khác không có tác dụng)</strong></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="clear10"></div>
                        <div style="display: none;">
                            <input type="text" style="width: 120px !important; height: 22px;" placeholder="Nhập Số Tiền" id="txtMoney" onkeydown="return numbersonly(this, window.event, false);" onkeyup="formatCurrency(this);">
                            <input type="button" onclick="TinhKhuyenMai('txtMoney', productConfig2017);" value="Khuyến mãi tin rao" style="background-color: #055699; border: none; width: auto; height: 27px; color: #fff !important; font-weight: bold; font-size: 12px !important;">
                            <input type="button" onclick="TinhKhuyenMai082017('txtMoney', productConfig082017);" value="Khuyến mãi tháng 8" style="background-color: #055699; border: none; width: auto; height: 27px; color: #fff !important; font-weight: bold; font-size: 12px !important;">

                            <input type="button" onclick="TinhKhuyenMai('txtMoney', bannerConfig2017);" value="Banner loại 1" style="background-color: #055699; border: none; width: auto; height: 27px; color: #fff !important; font-weight: bold; font-size: 12px !important;">

                            (VNĐ)
                            <br>

                            <br>
                        </div>
                        <div class="clear10"></div>

                        <table class="tbl" border="0" cellpadding="3px" cellspacing="0" width="100%">
                            <tbody><tr class="tit-tbl bg_tit">
                                <th style="width: 40px">
                                    STT
                                </th>
                                <th style="width: 70px">
                                    Mã tin
                                </th>
                                <th style="width: 330px">
                                    Tiêu đề
                                </th>
                                <th style="width: 30px">
                                    Xem
                                </th>
                                <th style="width: 90px">
                                    Ngày bắt đầu
                                </th>
                                <th style="width: 90px">
                                    Ngày hết hạn
                                </th>
                                <th style="width: 40px">
                                    Ghi chú
                                </th>
                            </tr>

                            <tr>
                                <td>

                                    1
                                </td>
                                <td class="aligncenter">
                                    <p>
                                        18965371
                                        <img src="https://file4.batdongsan.com.vn/images/Default/images/ViptypeV5-label.png">
                                    </p>
                                    Chưa duyệt
                                </td>
                                <td>

                                    <span style="float: left; word-wrap: break-word; color: #055699;" id="view_18965371"><img style="width: 77px; height: 62px; float: left; padding-right: 8px;" src="https://file4.batdongsan.com.vn/crop/77x62/2018/12/22/20181222012024-c868_wm.jpg" alt=" vị nhập thông tin nhà đất cần bán hoặc cho thuê vào các mục dưới đây)"> vị nhập thông tin nhà đất cần bán hoặc cho thuê vào các mục dưới đây)</span>
                                    <div style="clear: both; text-align: right; padding-top: 5px;">


                                        &nbsp;

                                        <a id="MainContent__userPage_ctl00_rpItems_lnkEdit_0" href="/trang-ca-nhan/uspg-updateproduct/itemId-18965371">
                                            <img src="https://file4.batdongsan.com.vn/images/sua.gif"> Sửa</a>&nbsp;


                                        <a id="MainContent__userPage_ctl00_rpItems_lnkDel_0" class="btn-xoa" href="/trang-ca-nhan/uspg-userdelproduct/itemId-18965371">Xóa</a>




                                        <div style="display: none;">

                                        </div>
                                    </div>
                                </td>
                                <td class="aligncenter">
                                    <p>
                                        <a id="pageviews_18965371" href="javascript: PageViewDaily('9fLJVubxXI8tONW9Zh5KSg==')" class="grey" style="text-decoration: underline">_</a>
                                    </p>

                                    <p>

                                        <br>

                                    </p>

                                </td>
                                <td class="aligncenter">
                                    <p>
                                        22-12-2018
                                    </p>
                                </td>
                                <td class="aligncenter">
                                    <p>
                                        22-01-2019
                                    </p>
                                </td>
                                <td class="aligncenter">
                                    <p>

                                        <a href="javascript:void(0)" onclick="GetAllNote('18965371')" class="grey" style="text-decoration: underline;">0</a>

                                    </p>
                                </td>
                            </tr>

                            </tbody></table>

                        <div class="pager">
                            <span id="MainContent__userPage_ctl00_DataPager"></span>
                        </div>
                        <div class="clear10"></div>
                        <div><strong>Note</strong></div>
                        <div>
                            Trong trường hợp Quý khách muốn đăng và quản lý tin rao tiếng Anh, xin vui lòng click vào đây <img src="https://file1.batdongsan.com.vn/images/flags/cy-GB.gif" width="24px">&nbsp;<a title="" href="/user-page"><strong>English</strong></a>
                        </div>


                        <input type="hidden" name="ctl00$MainContent$_userPage$ctl00$hddPageViewData" id="hddPageViewData" value="9fLJVubxXI8tONW9Zh5KSg%3d%3d">

                        <div class="clear">
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contentJS')

@endsection