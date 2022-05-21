<?php

namespace sunsunza2009\gbprimepay;

use sunsunza2009\gbprimepay\qrcode\qrCash;
use sunsunza2009\gbprimepay\qrcode\qrCredit;
use sunsunza2009\gbprimepay\mBanking;

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

		$this->app->singleton(qrCash::class, function () {
			return new qrCash;
		});
		
		$this->app->singleton(qrCredit::class, function () {
			return new qrCredit;
		});

		$this->app->singleton(mBanking::class, function () {
			return new mBanking;
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