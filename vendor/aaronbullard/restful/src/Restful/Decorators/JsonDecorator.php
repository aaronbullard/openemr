<?php namespace Aaronbullard\Restful\Decorators;

use Aaronbullard\Restful\Responder;

abstract class JsonDecorator extends Responder {

	protected $responder;

	public function __construct(Responder $responder)
	{
		$this->responder = $responder;
	}

	final public function __call($method, $args)
	{
		return call_user_func_array(array($this->responder, $method), $args);
	}

}