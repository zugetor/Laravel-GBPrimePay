<?php

namespace Zugetor\Gbprimepay\Facade;

class QrCode extends \Illuminate\Support\Facades\Facade
{
	protected static function getFacadeAccessor() {
		return \Zugetor\Gbprimepay\QrCode::class;
	}
}