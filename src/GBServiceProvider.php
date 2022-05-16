<?php

namespace sunsunza2009\gbprimepay;

use sunsunza2009\gbprimepay\qrcode\qrcash;
use sunsunza2009\gbprimepay\qrcode\qrcredit;
use sunsunza2009\gbprimepay\mbanking;

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

		$this->app->singleton(qrcash::class, function () {
			return new qrcash;
		});
		
		$this->app->singleton(qrcredit::class, function () {
			return new qrcredit;
		});

		$this->app->singleton(mbanking::class, function () {
			return new mbanking;
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