<?php

namespace sunsunza2009\gbprimepay;

use sunsunza2009\gbprimepay\GB;
use Illuminate\Support\Facades\Http;

class mBanking extends GB
{
    public static function create(int $amount, string $refNo, string $resUrl, string $bankCode)
    {   
        static::init();

        $digData = $amount.$refNo.$resUrl.self::$background_url.$bankCode;
        $sig = hash_hmac('sha256', $digData, self::$secret_key);
        
        $response = Http::asForm()->post(self::$url . '/v2/mobileBanking', [
            'publicKey' => self::$public_key,
            'backgroundUrl' => self::$background_url,
            'amount' => $amount,
            'referenceNo' => $refNo,
            'responseUrl' => $resUrl,
            'bankCode' => $bankCode,
            'checksum' => $sig,
        ]);
        return $response->json();
    }
}