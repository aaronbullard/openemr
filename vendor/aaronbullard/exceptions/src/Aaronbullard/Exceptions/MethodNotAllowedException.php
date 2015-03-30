<?php namespace Aaronbullard\Exceptions;

use Exception;

class MethodNotAllowedException extends HttpException {
	const HTTP_CODE = 405;
	const DESCRIPTION = "The method specified in the Request-Line is not allowed for the resource 
		identified by the Request-URI. The response MUST include an Allow header containing a 
		list of valid methods for the requested resource.";
}