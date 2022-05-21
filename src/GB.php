<?php

namespace sunsunza2009\gbprimepay;

class GB
{
    static protected $url;
    static protected $token;
    static protected $public_key;
    static protected $secret_key;
    static protected $background_url;

    protected static function init()
    {
        self::$url = config('gbprimepay.url');
        self::$token = config('gbprimepay.token');
        self::$public_key = config('gbprimepay.public_key');
        self::$secret_key = config('gbprimepay.secret_key');
        self::$background_url = config('gbprimepay.backgroundUrl');
    }
}