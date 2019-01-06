<?php 
if ( !ENV('IN_PHPBB') )
{
    die('Hacking attempt');
    exit;
}
global $province;
    
$province = array (
  0 => 
  array (
    'id' => 1,
    '_name' => 'Hồ Chí Minh',
    '_code' => 'SG',
  ),
  1 => 
  array (
    'id' => 2,
    '_name' => 'Hà Nội',
    '_code' => 'HN',
  ),
  2 => 
  array (
    'id' => 3,
    '_name' => 'Đà Nẵng',
    '_code' => 'DDN',
  ),
  3 => 
  array (
    'id' => 4,
    '_name' => 'Bình Dương',
    '_code' => 'BD',
  ),
  4 => 
  array (
    'id' => 5,
    '_name' => 'Đồng Nai',
    '_code' => 'DNA',
  ),
  5 => 
  array (
    'id' => 6,
    '_name' => 'Khánh Hòa',
    '_code' => 'KH',
  ),
  6 => 
  array (
    'id' => 7,
    '_name' => 'Hải Phòng',
    '_code' => 'HP',
  ),
  7 => 
  array (
    'id' => 8,
    '_name' => 'Long An',
    '_code' => 'LA',
  ),
  8 => 
  array (
    'id' => 9,
    '_name' => 'Quảng Nam',
    '_code' => 'QNA',
  ),
  9 => 
  array (
    'id' => 10,
    '_name' => 'Bà Rịa Vũng Tàu',
    '_code' => 'VT',
  ),
  10 => 
  array (
    'id' => 11,
    '_name' => 'Đắk Lắk',
    '_code' => 'DDL',
  ),
  11 => 
  array (
    'id' => 12,
    '_name' => 'Cần Thơ',
    '_code' => 'CT',
  ),
  12 => 
  array (
    'id' => 13,
    '_name' => 'Bình Thuận  ',
    '_code' => 'BTH',
  ),
  13 => 
  array (
    'id' => 14,
    '_name' => 'Lâm Đồng',
    '_code' => 'LDD',
  ),
  14 => 
  array (
    'id' => 15,
    '_name' => 'Thừa Thiên Huế',
    '_code' => 'TTH',
  ),
  15 => 
  array (
    'id' => 16,
    '_name' => 'Kiên Giang',
    '_code' => 'KG',
  ),
  16 => 
  array (
    'id' => 17,
    '_name' => 'Bắc Ninh',
    '_code' => 'BN',
  ),
  17 => 
  array (
    'id' => 18,
    '_name' => 'Quảng Ninh',
    '_code' => 'QNI',
  ),
  18 => 
  array (
    'id' => 19,
    '_name' => 'Thanh Hóa',
    '_code' => 'TH',
  ),
  19 => 
  array (
    'id' => 20,
    '_name' => 'Nghệ An',
    '_code' => 'NA',
  ),
  20 => 
  array (
    'id' => 21,
    '_name' => 'Hải Dương',
    '_code' => 'HD',
  ),
  21 => 
  array (
    'id' => 22,
    '_name' => 'Gia Lai',
    '_code' => 'GL',
  ),
  22 => 
  array (
    'id' => 23,
    '_name' => 'Bình Phước',
    '_code' => 'BP',
  ),
  23 => 
  array (
    'id' => 24,
    '_name' => 'Hưng Yên',
    '_code' => 'HY',
  ),
  24 => 
  array (
    'id' => 25,
    '_name' => 'Bình Định',
    '_code' => 'BDD',
  ),
  25 => 
  array (
    'id' => 26,
    '_name' => 'Tiền Giang',
    '_code' => 'TG',
  ),
  26 => 
  array (
    'id' => 27,
    '_name' => 'Thái Bình',
    '_code' => 'TB',
  ),
  27 => 
  array (
    'id' => 28,
    '_name' => 'Bắc Giang',
    '_code' => 'BG',
  ),
  28 => 
  array (
    'id' => 29,
    '_name' => 'Hòa Bình',
    '_code' => 'HB',
  ),
  29 => 
  array (
    'id' => 30,
    '_name' => 'An Giang',
    '_code' => 'AG',
  ),
  30 => 
  array (
    'id' => 31,
    '_name' => 'Vĩnh Phúc',
    '_code' => 'VP',
  ),
  31 => 
  array (
    'id' => 32,
    '_name' => 'Tây Ninh',
    '_code' => 'TNI',
  ),
  32 => 
  array (
    'id' => 33,
    '_name' => 'Thái Nguyên',
    '_code' => 'TN',
  ),
  33 => 
  array (
    'id' => 34,
    '_name' => 'Lào Cai',
    '_code' => 'LCA',
  ),
  34 => 
  array (
    'id' => 35,
    '_name' => 'Nam Định',
    '_code' => 'NDD',
  ),
  35 => 
  array (
    'id' => 36,
    '_name' => 'Quảng Ngãi',
    '_code' => 'QNG',
  ),
  36 => 
  array (
    'id' => 37,
    '_name' => 'Bến Tre',
    '_code' => 'BTR',
  ),
  37 => 
  array (
    'id' => 38,
    '_name' => 'Đắk Nông',
    '_code' => 'DNO',
  ),
  38 => 
  array (
    'id' => 39,
    '_name' => 'Cà Mau',
    '_code' => 'CM',
  ),
  39 => 
  array (
    'id' => 40,
    '_name' => 'Vĩnh Long',
    '_code' => 'VL',
  ),
  40 => 
  array (
    'id' => 41,
    '_name' => 'Ninh Bình',
    '_code' => 'NB',
  ),
  41 => 
  array (
    'id' => 42,
    '_name' => 'Phú Thọ',
    '_code' => 'PT',
  ),
  42 => 
  array (
    'id' => 43,
    '_name' => 'Ninh Thuận',
    '_code' => 'NT',
  ),
  43 => 
  array (
    'id' => 44,
    '_name' => 'Phú Yên',
    '_code' => 'PY',
  ),
  44 => 
  array (
    'id' => 45,
    '_name' => 'Hà Nam',
    '_code' => 'HNA',
  ),
  45 => 
  array (
    'id' => 46,
    '_name' => 'Hà Tĩnh',
    '_code' => 'HT',
  ),
  46 => 
  array (
    'id' => 47,
    '_name' => 'Đồng Tháp',
    '_code' => 'DDT',
  ),
  47 => 
  array (
    'id' => 48,
    '_name' => 'Sóc Trăng',
    '_code' => 'ST',
  ),
  48 => 
  array (
    'id' => 49,
    '_name' => 'Kon Tum',
    '_code' => 'KT',
  ),
  49 => 
  array (
    'id' => 50,
    '_name' => 'Quảng Bình',
    '_code' => 'QB',
  ),
  50 => 
  array (
    'id' => 51,
    '_name' => 'Quảng Trị',
    '_code' => 'QT',
  ),
  51 => 
  array (
    'id' => 52,
    '_name' => 'Trà Vinh',
    '_code' => 'TV',
  ),
  52 => 
  array (
    'id' => 53,
    '_name' => 'Hậu Giang',
    '_code' => 'HGI',
  ),
  53 => 
  array (
    'id' => 54,
    '_name' => 'Sơn La',
    '_code' => 'SL',
  ),
  54 => 
  array (
    'id' => 55,
    '_name' => 'Bạc Liêu',
    '_code' => 'BL',
  ),
  55 => 
  array (
    'id' => 56,
    '_name' => 'Yên Bái',
    '_code' => 'YB',
  ),
  56 => 
  array (
    'id' => 57,
    '_name' => 'Tuyên Quang',
    '_code' => 'TQ',
  ),
  57 => 
  array (
    'id' => 58,
    '_name' => 'Điện Biên',
    '_code' => 'DDB',
  ),
  58 => 
  array (
    'id' => 59,
    '_name' => 'Lai Châu',
    '_code' => 'LCH',
  ),
  59 => 
  array (
    'id' => 60,
    '_name' => 'Lạng Sơn',
    '_code' => 'LS',
  ),
  60 => 
  array (
    'id' => 61,
    '_name' => 'Hà Giang',
    '_code' => 'HG',
  ),
  61 => 
  array (
    'id' => 62,
    '_name' => 'Bắc Kạn',
    '_code' => 'BK',
  ),
  62 => 
  array (
    'id' => 63,
    '_name' => 'Cao Bằng',
    '_code' => 'CB',
  ),
);
?>