<?php namespace Aaronbullard\Restful;

use Illuminate\Support\ServiceProvider;
use Response as IlluminateResponse;
use Aaronbullard\Restful\Adapters\LaravelResponder;
use Aaronbullard\Restful\ResponderFacade;
use Aaronbullard\Restful\Decorators\Status;
use Aaronbullard\Restful\Decorators\HttpCode;
use Aaronbullard\Restful\Decorators\Redirection;
use Aaronbullard\Restful\Decorators\Meta;
use Aaronbullard\Restful\Decorators\Pagination;
use Aaronbullard\Restful\Decorators\Errors;
use Aaronbullard\Restful\Decorators\Data;


class RestfulServiceProvider extends ServiceProvider {

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
		$this->app->bindShared('Aaronbullard\\Restful\\Responder', function($app) {

			$responseObject = IlluminateResponse::getFacadeRoot();

			// Make adapter since Laravel's Response::json is static and cannot use $this
			$adapter = new LaravelResponder( $responseObject );

			// Now decorate
			return new Data( new HttpCode( new Status( new Errors( new Meta( new Pagination( new Redirection( $adapter )))))));
		});

		$this->app->bindShared('Aaronbullard\\Restful\\ResponderFacade', function($app){
			$responder = $app->make('Aaronbullard\\Restful\\Responder');
			return new ResponderFacade( $responder );
		});

		$this->app->bind('Aaronbullard\\Restful\\ResponseInterface', 'Aaronbullard\\Restful\\ResponderFacade');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('aaronbullard/restful');
	}

}
