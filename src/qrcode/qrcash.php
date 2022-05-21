<?php

namespace sunsunza2009\gbprimepay\qrcode;

use sunsunza2009\gbprimepay\GB;
use Illuminate\Support\Facades\Http;

class qrCash extends GB
{
    public static function create(int $amount, string $refNo)
    {
        static::init();
        
        $data = [
            'token' => self::$token,
            'amount' => $amount,
            'referenceNo' => $refNo
        ];
        if(!empty(self::$background_url)){
            $data["backgroundUrl"] = self::$background_url;
        }
        
        $response = Http::asForm()->post(self::$url . '/v3/qrcode/text', $data);
        return $response->json();
    }
}