<?php

namespace sunsunza2009\gbprimepay\qrcode;

use Illuminate\Support\Facades\Http;

class qrcash
{
    public static function create(int $amount, string $refNo)
    {
        $data = [
            'token' => config('gbprimepay.token'),
            'amount' => $amount,
            'referenceNo' => $refNo
        ];
        if(!empty(config('gbprimepay.backgroundUrl'))){
            $data["backgroundUrl"] = config('gbprimepay.backgroundUrl');
        }
        
        $response = Http::asForm()->post(config('gbprimepay.url') . '/v3/qrcode/text', $data);
        return $response->json();
    }
}