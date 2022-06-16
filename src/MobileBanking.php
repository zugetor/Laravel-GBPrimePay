<?php

namespace Sunsunza2009\Gbprimepay;

use Illuminate\Support\Facades\Http;

class MobileBanking
{

    protected static string $url;
    protected static string $token;
    protected static string $public_key;
    protected static string $secret_key;
    protected float $amount;
    protected ?string $reference_no = null;
    protected ?string $background_url = null;
    protected ?string $response_url = null;
    protected ?string $bank_code = null;

    public function __construct()
    {
        self::$url = config('gbprimepay.url');
        self::$token = config('gbprimepay.token');
        self::$public_key = config('gbprimepay.public_key');
        self::$secret_key = config('gbprimepay.secret_key');
    }

    public function setAmount(float $amt): MobileBanking
    {
        $this->amount = $amt;
        return $this;
    }

    public function setRefNo(string $ref): MobileBanking
    {
        $this->reference_no = $ref;
        return $this;
    }

    public function setBackgroundUrl(string $bgUrl): MobileBanking
    {
        $this->background_url = $bgUrl;
        return $this;
    }

    public function setResponseUrl(string $resUrl): MobileBanking
    {
        $this->response_url = $resUrl;
        return $this;   
    }

    public function setBankCode(string $bankCode): MobileBanking
    {
        $this->bank_code = $bankCode;
        return $this;   
    }

    public function send(): array
    {
        $amount = number_format($this->amount, 2, ".", "");
        $digData = $amount.$this->reference_no.$this->response_url.$this->background_url.$this->bank_code;
        $sig = hash_hmac('sha256', $digData, self::$secret_key);

        $response = Http::asForm()->post(self::$url . '/v2/mobileBanking', [
            'publicKey' => self::$public_key,
            'backgroundUrl' => $this->background_url,
            'amount' => $amount,
            'referenceNo' => $this->reference_no,
            'responseUrl' => $this->response_url,
            'bankCode' => $this->bank_code,
            'checksum' => $sig,
        ]);
        return array("status"=>$response->status(),"body"=>$response->body());
    }
}