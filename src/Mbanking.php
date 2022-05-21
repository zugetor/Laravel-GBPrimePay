<?php

namespace Sunsunza2009\Gbprimepay;

use Sunsunza2009\Gbprimepay\GB;
use Illuminate\Support\Facades\Http;

class MBanking extends GB
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