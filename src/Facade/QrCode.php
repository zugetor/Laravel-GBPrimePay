<?php

namespace Sunsunza2009\Gbprimepay\Facade;

class QrCode extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sunsunza2009\Gbprimepay\QrCode::class;
    }
}