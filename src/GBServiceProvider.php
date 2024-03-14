<?php

namespace Zugetor\Gbprimepay;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class GBServiceProvider extends LaravelServiceProvider {
	public function boot() {
		$this->publishes([
			__DIR__ . '/../config/gbprimepay.php' => config_path('gbprimepay.php'),
		], 'config');
	}

	public function register() {
		$configPath = __DIR__ . '/../config/gbprimepay.php';
		$this->mergeConfigFrom($configPath, 'gbprimepay');

		$this->app->singleton(QrCode::class, function () {
			return new QrCode();
		});

		$this->app->singleton(MobileBanking::class, function () {
			return new MobileBanking();
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