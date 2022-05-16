<?php

namespace sunsunza2009\gbprimepay\qrcode;

use Illuminate\Support\Facades\Http;

class qrcredit
{
    public static function create(int $amount, string $refNo)
    {
        $response = Http::asForm()->post(config('gbprimepay.url') . '/v3/qrcredit/text', [
            'token' => config('gbprimepay.token'),
            'backgroundUrl' => config('gbprimepay.backgroundUrl'),
            'amount' => $amount,
            'referenceNo' => $refNo
        ]);
        return $response->json();
    }
}