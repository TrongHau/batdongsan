<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
        </div>

    </div>
</div>
<div class="footer">
    <div class="footer-bottom">
        <div class="clearboth pad-bot-10">
            <div class="footer-home" style="width: 84%;">
                <div class="footer-bottom-top-1">
                    <a href="{{env("APP_URL")}}/gioi-thieu" rel="nofollow">Giới thiệu</a>
                </div>
                <div class="footer-bottom-top-1">
                    <a href="{{env("APP_URL")}}/dieu-khoan-thoa-thuan" rel="nofollow">Điều khoản thỏa
                        thuận</a>
                </div>
                <div class="footer-bottom-top-1">
                    <a href="{{env("APP_URL")}}/chinh-sach-bao-mat-thong-tin" rel="nofollow">Chính sách
                        bảo mật thông tin</a>
                </div>
                <div class="footer-bottom-top-1">
                    <a href="{{env("APP_URL")}}/bao-gia-ho-tro" rel="nofollow">Báo giá &amp; hỗ trợ</a>
                </div>
                <div class="footer-bottom-top-1">
                    <a href="{{env("APP_URL")}}/nhung-cau-hoi-thuong-gap" rel="nofollow">Những câu hỏi
                        thường gặp</a>
                </div>
                <div class="footer-bottom-top-1">
                    <a href="{{env("APP_URL")}}/quy-dinh-dang-tin" rel="nofollow">Quy định đăng tin</a>
                </div>
                <div class="footer-bottom-top-1" style="border: none;">
                    <a href="{{env("APP_URL")}}/lien-he" rel="nofollow">Liên hệ</a>
                </div>
                <div class="clear">
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="footer-bottom-end">
            <div class="footer-bottom-end-row1" style="color: #555754">
                © 2019 - Bản quyền của website Batdongsan.company
                <br/>
                Địa chỉ: 197/42/15 Đường TL15, Thạnh Lộc, Quận 12, HCM City
                <br/>
                Điện thoại: 0901 472486
                <br/>
                Email {{env('HO_TRO')}}
            </div>
            <div class="clear10"></div>
        </div>
    </div>
</div>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132872367-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-132872367-1');
</script>
