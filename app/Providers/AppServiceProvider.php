<?php namespace OEMR\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	protected static $providers = [
		'Aaronbullard\\Restful\\RestfulServiceProvider',
		'Aaronbullard\\Restful\\RestfulExceptionHandlerServiceProvider'
	];

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'OEMR\Services\Registrar'
		);

		$this->registerProviders();
	}

	protected function registerProviders()
	{
		foreach(static::$providers as $provider)
		{
			$this->app->register($provider);
		}
	}

}
