<?php namespace Aaronbullard\Exceptions;

use Exception;

class UnauthorizedException extends HttpException {
	const HTTP_CODE = 401;
	const DESCRIPTION = "Similar to 403 Forbidden, but specifically for use when authentication 
		is required and has failed or has not yet been provided. The response must include a WWW-Authenticate 
		header field containing a challenge applicable to the requested resource.";
}