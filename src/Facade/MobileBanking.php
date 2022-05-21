<?php

namespace Sunsunza2009\Gbprimepay\Facade;

class MobileBanking extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sunsunza2009\Gbprimepay\MobileBanking::class;
    }
}