<?php namespace Aaronbullard\Exceptions;

use Exception;

abstract class HttpException extends CoreException {

	public function getHttpCode()
	{
		return static::HTTP_CODE;
	}
	
}