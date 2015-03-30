<?php namespace Aaronbullard\Restful\Adapters;

use Illuminate\Contracts\Routing\ResponseFactory as IlluminateResponse;
use Aaronbullard\Restful\Responder;

class LaravelResponder extends Responder {

	protected $responder;

	public function __construct(IlluminateResponse $responder)
	{
		$this->responder = $responder;
	}

	public function respond(array $data = [], $http_code = 200, array $headers = [])
	{
		return $this->responder->json($data, $http_code, $headers);
	}

}
