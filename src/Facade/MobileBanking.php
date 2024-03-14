<?php

namespace Zugetor\Gbprimepay\Facade;

class MobileBanking extends \Illuminate\Support\Facades\Facade
{
	protected static function getFacadeAccessor() {
		return \Zugetor\Gbprimepay\MobileBanking::class;
	}
}