<?php namespace Aaronbullard\Restful;

use Illuminate\Support\ServiceProvider;

class RestfulExceptionHandlerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton(
			'Illuminate\\Contracts\\Debug\\ExceptionHandler',
			'Aaronbullard\\Restful\\Handlers\\LaravelExceptionHandler'
		);
	}

}
