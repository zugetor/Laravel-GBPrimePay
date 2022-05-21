<?php

namespace Sunsunza2009\Gbprimepay;

use Sunsunza2009\Gbprimepay\Qrcode\QrCash;
use Sunsunza2009\Gbprimepay\Qrcode\QrCredit;
use Sunsunza2009\Gbprimepay\MBanking;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class GBServiceProvider extends LaravelServiceProvider
{
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../config/gbprimepay.php' => config_path('gbprimepay.php'),
		], 'config');
	}

	public function register()
	{
		$configPath = __DIR__ . '/../config/gbprimepay.php';
		$this->mergeConfigFrom($configPath, 'gbprimepay');

		$this->app->singleton(QrCash::class, function () {
			return new QrCash;
		});
		
		$this->app->singleton(QrCredit::class, function () {
			return new QrCredit;
		});

		$this->app->singleton(MBanking::class, function () {
			return new MBanking;
		});
	}

	/**
	 * @return array
	public function provides()
	{
		return [gbprimepay::class];
	}
	*/
}