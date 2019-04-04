<div id="MiddleSubMenu">
    <div class="home-top-search" style="padding-bottom: 10px !important;">
        <div class="home-top-search-keyword">
            <input name="tu-khoa" type="text" value="{{$key ?? ''}}" id="tu-khoa" placeholder="Nhập từ khóa để tìm theo cụm từ" autocomplete="nope" class="txtKeyword">
        </div>
        <select name="hinh-thuc" class="advance-select-box" id="hinh-thuc">
            <option value="nha-dat-ban" class="advance-options" style="min-width: 195px;">Nhà đất bán</option>
            <option value="nha-dat-cho-thue" class="advance-options" style="min-width: 195px;">Nhà đất cho thuê</option>
            <option value="nha-dat-can-mua" class="advance-options" style="min-width: 195px;">Nhà đất cần mua</option>
            <option value="nha-dat-can-thue" class="advance-options" style="min-width: 195px;">Nhà đất cần thuê</option>
        </select>
        <img src="/imgs/header-bottom-button.jpg" onclick="redirectSearch();" class="fg-button fg-button-bg-default fg-button-toggleable ui-corner-all" alt="Tìm kiếm">
    </div>
    <script>
        function redirectSearch() {
            if(!$('#tu-khoa').val()) {
                alertModal('Vui lòng nhập từ khóa tìm kiếm');
                return false;
            }
            let key = $('#tu-khoa').val().replace("/", "");
            key = key.replace("/", "");
            window.location.href = window.location.origin + '/' + $('#hinh-thuc').val() + '/' + key;
        }
        <?php
            if(isset($key) && $key) {
                ?>
                    document.getElementById('hinh-thuc').value = '<?php echo $titleArticle->url ?>';
                <?php
            }
        ?>
    </script>
    <div style="clear:both;"></div>
</div>
