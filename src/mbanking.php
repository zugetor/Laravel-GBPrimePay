<?php

namespace sunsunza2009\gbprimepay;

use Illuminate\Support\Facades\Http;

class mbanking
{
    public static function create(int $amount, string $refNo, string $resUrl, int $bankCode)
    {   
        $digData = $amount.$refNo.$resUrl.config('gbprimepay.backgroundUrl').$bankCode;
        $sig = hash_hmac('sha256', $digData, config('gbprimepay.secret_key'));
        
        $response = Http::asForm()->post(config('gbprimepay.url') . '/v2/mobileBanking', [
            'publicKey' => config('gbprimepay.public_key'),
            'backgroundUrl' => config('gbprimepay.backgroundUrl'),
            'amount' => $amount,
            'referenceNo' => $refNo,
            'responseUrl' => $resUrl,
            'bankCode' => $bankCode,
            'checksum' => $sig,
        ]);
        return $response->json();
    }
}