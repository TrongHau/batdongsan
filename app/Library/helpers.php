<?php
namespace App\Library;

use DateTime;
use Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class Helpers
{
    public static function ajaxResult($is_success = true,
                                      $message = '',
                                      $data = array(),
                                      $terminer = true)
    {
        echo json_encode(array(
                'success' => $is_success,
                'message' => $message,
                'data' => $data)
        );
        if ($terminer) {
            exit();
        }
    }
    public static function file_path($id, $dir = '', $url = '')
    {
        $url = ($url == '') ? env('DATA_URL') : '';
        return $url . $dir . ceil($id/100) . '/';
    }
    public static function saveBase64Image($data, $path, $fileName = null, $type = 'png')
    {
        $data = str_replace('data:image/png;base64,', '', $data);
        $data = str_replace('data:image/jpeg;base64,', '', $data);
        $data = str_replace(' ', '+', $data);
        $data = base64_decode($data);
        $fileName = ($fileName ?? rand() . '_' . time()) . '.' .$type;
        Storage::put('public' . $path . $fileName, $data);
        return $fileName;
    }
    public static function khongdau($str)
    {
        static $unicode_trans = array(
            "á" => "a", "à" => "a", "ả" => "a", "ã" => "a", "ạ" => "a", "ă" => "a", "ắ" => "a", "ằ" => "a", "ẳ" => "a", "ẵ" => "a", "ặ" => "a", "â" => "a", "ấ" => "a", "ầ" => "a", "ẩ" => "a", "ẫ" => "a", "ậ" => "a",
            "Á" => "A", "À" => "A", "Ả" => "A", "Ã" => "A", "Ạ" => "A", "Ă" => "A", "Ắ" => "A", "Ằ" => "A", "Ẳ" => "A", "Ẵ" => "A", "Ặ" => "A", "Â" => "A", "Ấ" => "A", "Ầ" => "A", "Ẩ" => "A", "Ẫ" => "A", "Ậ" => "A",
            "é" => "e", "è" => "e", "ẻ" => "e", "ẽ" => "e", "ẹ" => "e", "ê" => "e", "ế" => "e", "ề" => "e", "ể" => "e", "ễ" => "e", "ệ" => "e",
            "É" => "E", "È" => "E", "Ẻ" => "E", "Ẽ" => "E", "Ẹ" => "E", "Ê" => "E", "Ế" => "E", "Ề" => "E", "Ể" => "E", "Ễ" => "E", "Ệ" => "E",
            "í" => "i", "ì" => "i", "ỉ" => "i", "ĩ" => "i", "ị" => "i",
            "Í" => "I", "Ì" => "I", "Ỉ" => "I", "Ĩ" => "I", "Ị" => "I",
            "ó" => "o", "ò" => "o", "ỏ" => "o", "õ" => "o", "ọ" => "o", "ô" => "o", "ố" => "o", "ồ" => "o", "ổ" => "o", "ỗ" => "o", "ộ" => "o", "ơ" => "o", "ớ" => "o", "ờ" => "o", "ở" => "o", "ỡ" => "o", "ợ" => "o",
            "Ó" => "O", "Ò" => "O", "Ỏ" => "O", "Õ" => "O", "Ọ" => "O", "Ô" => "O", "Ố" => "O", "Ồ" => "O", "Ổ" => "O", "Ỗ" => "O", "Ộ" => "O", "Ơ" => "O", "Ớ" => "O", "Ờ" => "O", "Ở" => "O", "Ỡ" => "O", "Ợ" => "O",
            "ú" => "u", "ù" => "u", "ủ" => "u", "ũ" => "u", "ụ" => "u", "ư" => "u", "ứ" => "u", "ừ" => "u", "ử" => "u", "ữ" => "u", "ự" => "u",
            "Ú" => "U", "Ù" => "U", "Ủ" => "U", "Ũ" => "U", "Ụ" => "U", "Ư" => "U", "Ứ" => "U", "Ừ" => "U", "Ử" => "U", "Ữ" => "U", "Ự" => "U",
            "ý" => "y", "ỳ" => "y", "ỷ" => "y", "ỹ" => "y", "ỵ" => "y",
            "Ý" => "Y", "Ỳ" => "Y", "Ỷ" => "Y", "Ỹ" => "Y", "Ỵ" => "Y",
            "đ" => "d",
            "Đ" => "D",
        );

        return strtr($str, $unicode_trans);
    }

    public static function rawTiengVietUrl($str, $spaceReplace = '-')
    {
        return preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('-', $spaceReplace, '-'), self::khongdau($str));
    }
    public static function convertCurrency($text) {
        if($text == 'Triệu' || $text == 'Triệu/m2' || $text == 'Triệu/tháng' || $text == 'Triệu/m2/tháng') {
            return 1000000;
        }elseif($text == 'Tỷ') {
            return 1000000000;
        }elseif($text == 'Nghìn/m2/tháng' || $text == 'Nghìn/tháng') {
            return 1000;
        }elseif($text == 'Trăm nghìn/m2') {
            return 100;
        }else{
            return 0;
        }
    }
    public static function getRandLimitArr($arr = array(), $length = 1)
    {
        if (count($arr) <= $length) {
            return $arr;
        }
        $randArr = array_rand($arr, $length);
        $result = array();
        foreach ($randArr as $val) {
            $result[] = $arr[$val];
        }
        return $result;
    }
    public static function sendSMS($sendPhone, $content, $smsResult = false) {
        $APIKey = env('SMS_API_KEY');
        $SecretKey = env('SMS_SECRET_KEY');
        // $YourPhone="0901472486";
        $YourPhone = $sendPhone;
//        $Content = "Mã xác thực số điện thoại của bạn tại Batdongsan.company là: 123456";
        $Content = $content;

        $SendContent = urlencode($Content);
        $data = "http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&SmsType=" . env('SMS_TYPE');
        //De dang ky brandname rieng vui long lien he hotline 0902435340 hoac nhan vien kinh Doanh cua ban
        $curl = curl_init($data);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        $obj = json_decode($result, true);
        if(!$smsResult) {
            if ($obj['CodeResult'] == 100) {
                return true;
            } else {
                return false;
            }
        }
        if ($obj['CodeResult'] == 100) {
            print "<br>";
            print "CodeResult:" . $obj['CodeResult'];
            print "<br>";
            print "CountRegenerate:" . $obj['CountRegenerate'];
            print "<br>";
            print "SMSID:" . $obj['SMSID'];
            print "<br>";
        } else {
            print "ErrorMessage:" . $obj['ErrorMessage'];
        }
        exit();
    }
}
