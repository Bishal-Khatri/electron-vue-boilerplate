<?php
namespace App\Helper;

class Utils
{
    public static function setResponse(bool $error, string $message, $data, $meta = '')
    {
        $responseData = [
            'error' => $error,
            'message'=>$message,
            'data' => $data,
            'meta' => $meta
        ];
        return $responseData;
    }
}
