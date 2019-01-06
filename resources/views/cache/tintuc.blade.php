<?php 
if ( !ENV('IN_PHPBB') )
{
    die('Hacking attempt');
    exit;
}
global $tintuc;
global $loikhuyen;
global $tuvanluat;
    
$tintuc = array (
  1 => 
  array (
    0 => 
    array (
      'category_id' => 1,
      'title' => 'Luật sư chia sẻ kinh nghiệm để tránh "sập bẫy" lừa mua nhà trên giấy',
      'slug' => 'luat-su-chia-se-kinh-nghiem-de-tranh-sap-bay-lua-mua-nha-tren-giay',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190102144958-01f8.jpg',
      'slug_category' => 'chinh-sach-quan-ly',
      'category_parent_id' => NULL,
    ),
    1 => 
    array (
      'category_id' => 1,
      'title' => 'Những thị trường dự báo sẽ có "sóng" đất nền, nhà phố trong năm 2019',
      'slug' => 'nhung-thi-truong-du-bao-se-co-song-dat-nen-nha-pho-trong-nam-2019-1',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190105095640-7f24 (1).jpg',
      'slug_category' => 'chinh-sach-quan-ly',
      'category_parent_id' => NULL,
    ),
    2 => 
    array (
      'category_id' => 1,
      'title' => 'Batdongsan.com.vn thông báo lịch nghỉ nhân kỷ niệm 12 năm thành lập',
      'slug' => 'batdongsan-com-vn-thong-bao-lich-nghi-nhan-ky-niem-12-nam-thanh-lap-1',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190104162011-2c1e.jpg',
      'slug_category' => 'chinh-sach-quan-ly',
      'category_parent_id' => NULL,
    ),
  ),
  2 => 
  array (
    0 => 
    array (
      'category_id' => 2,
      'title' => 'Xin cấp lại sổ đỏ bị rách cần phải làm những thủ tục gì?',
      'slug' => 'xin-cap-lai-so-do-bi-rach-can-phai-lam-nhung-thu-tuc-gi',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20181218094703-6c96.jpg',
      'slug_category' => 'thong-tin-quy-hoach',
      'category_parent_id' => NULL,
    ),
    1 => 
    array (
      'category_id' => 2,
      'title' => 'Chìa khóa “vàng” cho tiềm năng sinh lời của Tuần Châu Marina',
      'slug' => 'chia-khoa-vang-cho-tiem-nang-sinh-loi-cua-tuan-chau-marina',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190102114558-c5f9.jpg',
      'slug_category' => 'thong-tin-quy-hoach',
      'category_parent_id' => NULL,
    ),
  ),
  3 => 
  array (
  ),
  4 => 
  array (
  ),
  5 => 
  array (
    0 => 
    array (
      'category_id' => 5,
      'title' => 'Ecotown Phú Mỹ - Tầm nhìn mới của nhà đầu tư',
      'slug' => 'ecotown-phu-my-tam-nhin-moi-cua-nha-dau-tu',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190104141147-84b1.jpg',
      'slug_category' => 'tin-thi-truong',
      'category_parent_id' => 4,
    ),
    1 => 
    array (
      'category_id' => 5,
      'title' => 'Đất nền Long Thành: Kênh đầu tư hấp dẫn năm 2019',
      'slug' => 'dat-nen-long-thanh-kenh-dau-tu-hap-dan-nam-2019',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190102144958-01f8.jpg',
      'slug_category' => 'tin-thi-truong',
      'category_parent_id' => 4,
    ),
    2 => 
    array (
      'category_id' => 5,
      'title' => 'Những thị trường dự báo sẽ có "sóng" đất nền, nhà phố trong năm 2019',
      'slug' => 'nhung-thi-truong-du-bao-se-co-song-dat-nen-nha-pho-trong-nam-2019',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190105095640-7f24.jpg',
      'slug_category' => 'tin-thi-truong',
      'category_parent_id' => 4,
    ),
    3 => 
    array (
      'category_id' => 5,
      'title' => 'Batdongsan.com.vn thông báo lịch nghỉ nhân kỷ niệm 12 năm thành lập',
      'slug' => 'batdongsan-com-vn-thong-bao-lich-nghi-nhan-ky-niem-12-nam-thanh-lap',
      'views' => 0,
      'image' => NULL,
      'slug_category' => 'tin-thi-truong',
      'category_parent_id' => 4,
    ),
    4 => 
    array (
      'category_id' => 5,
      'title' => 'Tp.HCM: Tăng tổng mức đầu tư 2 tuyến metro từ 43.000 tỷ lên 95.000 tỷ đồng',
      'slug' => 'tp-hcm-tang-tong-muc-dau-tu-2-tuyen-metro-tu-43-000-ty-len-95-000-ty-dong',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190104162011-2c1e.jpg',
      'slug_category' => 'tin-thi-truong',
      'category_parent_id' => 4,
    ),
  ),
  6 => 
  array (
    0 => 
    array (
      'category_id' => 6,
      'title' => 'Chuyên gia "bắt mạch" thị trường nói gì về bong bóng BĐS năm 2019?',
      'slug' => 'chuyen-gia-bat-mach-thi-truong-noi-gi-ve-bong-bong-bds-nam-2019',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20181218094703-6c96.jpg',
      'slug_category' => 'phan-tich-nhan-dinh',
      'category_parent_id' => 4,
    ),
  ),
  7 => 
  array (
    0 => 
    array (
      'category_id' => 7,
      'title' => '4 chiến thuật đầu tư hiệu quả khi thị trường bất động sản giảm tốc',
      'slug' => '4-chien-thuat-dau-tu-hieu-qua-khi-thi-truong-bat-dong-san-giam-toc',
      'views' => 0,
      'image' => NULL,
      'slug_category' => 'bat-dong-san-the-gioi',
      'category_parent_id' => 4,
    ),
  ),
  8 => 
  array (
    0 => 
    array (
      'category_id' => 8,
      'title' => 'Bất động sản ven mặt nước trên toàn cầu ngày càng đắt đỏ',
      'slug' => 'bat-dong-san-ven-mat-nuoc-tren-toan-cau-ngay-cang-dat-do',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20181218094703-6c96.jpg',
      'slug_category' => 'tai-chinh-chung-khoan-bat-dong-san',
      'category_parent_id' => 4,
    ),
  ),
  9 => 
  array (
    0 => 
    array (
      'category_id' => 9,
      'title' => 'Có phải hỏi chồng cũ khi bán căn nhà từng ở chung?',
      'slug' => 'co-phai-hoi-chong-cu-khi-ban-can-nha-tung-o-chung',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190102144958-01f8.jpg',
      'slug_category' => 'tu-van-luat-bat-dong-san',
      'category_parent_id' => 4,
    ),
    1 => 
    array (
      'category_id' => 9,
      'title' => 'Hàng loạt tuyến đường cửa ngõ Đông Bắc Sài Gòn sắp được đầu tư mở rộng',
      'slug' => 'hang-loat-tuyen-duong-cua-ngo-dong-bac-sai-gon-sap-duoc-dau-tu-mo-rong',
      'views' => 0,
      'image' => NULL,
      'slug_category' => 'tu-van-luat-bat-dong-san',
      'category_parent_id' => 4,
    ),
    2 => 
    array (
      'category_id' => 9,
      'title' => 'Luật không cấm xây nhà "ba chung", Tp.HCM bối rối',
      'slug' => 'luat-khong-cam-xay-nha-ba-chung-tp-hcm-boi-roi',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190104105200-83f4.jpg',
      'slug_category' => 'tu-van-luat-bat-dong-san',
      'category_parent_id' => 4,
    ),
  ),
  10 => 
  array (
  ),
  11 => 
  array (
    0 => 
    array (
      'category_id' => 11,
      'title' => 'Vợ có được một mình đứng tên mua nhà làm tài sản riêng không?',
      'slug' => 'vo-co-duoc-mot-minh-dung-ten-mua-nha-lam-tai-san-rieng-khong',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190104162011-2c1e.jpg',
      'slug_category' => 'quyen-so-huu',
      'category_parent_id' => 9,
    ),
    1 => 
    array (
      'category_id' => 11,
      'title' => 'Chưa có sổ đỏ có được tách thửa đất không?',
      'slug' => 'chua-co-so-do-co-duoc-tach-thua-dat-khong',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20181220112450-7cd5.jpg',
      'slug_category' => 'quyen-so-huu',
      'category_parent_id' => 9,
    ),
  ),
  12 => 
  array (
  ),
  13 => 
  array (
  ),
  14 => 
  array (
    0 => 
    array (
      'category_id' => 14,
      'title' => 'Thách thức và cơ hội nào cho thị trường bất động sản Việt Nam năm 2019?',
      'slug' => 'thach-thuc-va-co-hoi-nao-cho-thi-truong-bat-dong-san-viet-nam-nam-2019',
      'views' => 0,
      'image' => NULL,
      'slug_category' => 'nghia-vu-tai-chinh',
      'category_parent_id' => 9,
    ),
  ),
  15 => 
  array (
  ),
  16 => 
  array (
  ),
  17 => 
  array (
    0 => 
    array (
      'category_id' => 17,
      'title' => 'Có chung quyền sử dụng đất thì được cấp sổ đỏ như thế nào?',
      'slug' => 'co-chung-quyen-su-dung-dat-thi-duoc-cap-so-do-nhu-the-nao',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20190104105200-83f4.jpg',
      'slug_category' => 'loi-khuyen-cho-nguoi-mua',
      'category_parent_id' => 16,
    ),
  ),
  18 => 
  array (
    0 => 
    array (
      'category_id' => 18,
      'title' => 'Nhiều gia đình bỏ lỡ cơ hội mua nhà chỉ vì không hợp phong thủy',
      'slug' => 'nhieu-gia-dinh-bo-lo-co-hoi-mua-nha-chi-vi-khong-hop-phong-thuy',
      'views' => 0,
      'image' => NULL,
      'slug_category' => 'loi-khuyen-cho-nguoi-ban',
      'category_parent_id' => 16,
    ),
  ),
  19 => 
  array (
  ),
  20 => 
  array (
    0 => 
    array (
      'category_id' => 20,
      'title' => 'Để nhà cửa bừa bộn nên suốt một năm, tôi vẫn không bán được nhà',
      'slug' => 'de-nha-cua-bua-bon-nen-suot-mot-nam-toi-van-khong-ban-duoc-nha',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20181218094703-6c96.jpg',
      'slug_category' => 'loi-khuyen-cho-nguoi-thue',
      'category_parent_id' => 16,
    ),
    1 => 
    array (
      'category_id' => 20,
      'title' => 'Bế tắc vì xây biệt thự tiền tỷ ở ngoại thành nhưng muốn bán không ai mua',
      'slug' => 'be-tac-vi-xay-biet-thu-tien-ty-o-ngoai-thanh-nhung-muon-ban-khong-ai-mua',
      'views' => 0,
      'image' => 'uploads/tin-tuc/20181218094703-6c96.jpg',
      'slug_category' => 'loi-khuyen-cho-nguoi-thue',
      'category_parent_id' => 16,
    ),
  ),
  21 => 
  array (
  ),
);
$loikhuyen = array (
  0 => 
  array (
    'category_id' => 17,
    'title' => 'Có chung quyền sử dụng đất thì được cấp sổ đỏ như thế nào?',
    'slug' => 'co-chung-quyen-su-dung-dat-thi-duoc-cap-so-do-nhu-the-nao',
    'views' => 0,
    'image' => 'uploads/tin-tuc/20190104105200-83f4.jpg',
    'slug_category' => 'loi-khuyen-cho-nguoi-mua',
    'category_parent_id' => 16,
  ),
  1 => 
  array (
    'category_id' => 18,
    'title' => 'Nhiều gia đình bỏ lỡ cơ hội mua nhà chỉ vì không hợp phong thủy',
    'slug' => 'nhieu-gia-dinh-bo-lo-co-hoi-mua-nha-chi-vi-khong-hop-phong-thuy',
    'views' => 0,
    'image' => NULL,
    'slug_category' => 'loi-khuyen-cho-nguoi-ban',
    'category_parent_id' => 16,
  ),
  2 => 
  array (
    'category_id' => 20,
    'title' => 'Để nhà cửa bừa bộn nên suốt một năm, tôi vẫn không bán được nhà',
    'slug' => 'de-nha-cua-bua-bon-nen-suot-mot-nam-toi-van-khong-ban-duoc-nha',
    'views' => 0,
    'image' => 'uploads/tin-tuc/20181218094703-6c96.jpg',
    'slug_category' => 'loi-khuyen-cho-nguoi-thue',
    'category_parent_id' => 16,
  ),
  3 => 
  array (
    'category_id' => 20,
    'title' => 'Bế tắc vì xây biệt thự tiền tỷ ở ngoại thành nhưng muốn bán không ai mua',
    'slug' => 'be-tac-vi-xay-biet-thu-tien-ty-o-ngoai-thanh-nhung-muon-ban-khong-ai-mua',
    'views' => 0,
    'image' => 'uploads/tin-tuc/20181218094703-6c96.jpg',
    'slug_category' => 'loi-khuyen-cho-nguoi-thue',
    'category_parent_id' => 16,
  ),
);
$tuvanluat = array (
  0 => 
  array (
    'category_id' => 14,
    'title' => 'Thách thức và cơ hội nào cho thị trường bất động sản Việt Nam năm 2019?',
    'slug' => 'thach-thuc-va-co-hoi-nao-cho-thi-truong-bat-dong-san-viet-nam-nam-2019',
    'views' => 0,
    'image' => NULL,
    'slug_category' => 'nghia-vu-tai-chinh',
    'category_parent_id' => 9,
  ),
  1 => 
  array (
    'category_id' => 11,
    'title' => 'Chưa có sổ đỏ có được tách thửa đất không?',
    'slug' => 'chua-co-so-do-co-duoc-tach-thua-dat-khong',
    'views' => 0,
    'image' => 'uploads/tin-tuc/20181220112450-7cd5.jpg',
    'slug_category' => 'quyen-so-huu',
    'category_parent_id' => 9,
  ),
);
?>