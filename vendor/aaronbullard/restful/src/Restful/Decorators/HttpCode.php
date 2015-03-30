<?php namespace Aaronbullard\Restful\Decorators;

use Aaronbullard\Restful\ResponderException;
use Aaronbullard\Restful\Interfaces\HttpCodeInterface;

class HttpCode extends JsonDecorator implements HttpCodeInterface {

	protected $http_code;

	public function setHttpCode($http_code)
	{
		if( gettype($http_code) !== 'integer' )
		{
			throw new ResponderException("Http Code must be an integer.");
		}

		$this->http_code = (int) $http_code;

		return $this;
	}

	public function getHttpCode()
	{
		return $this->http_code;
	}

	public function respond(array $data = [], $http_code = 200, array $headers = [])
	{
		$data['http'] = $this->getHttpCode() ?: $http_code;

		return $this->responder->respond($data, $data['http'], $headers);
	}

}