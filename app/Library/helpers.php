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
        return $url . $dir . ceil($id/1000) . '/';
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
}
