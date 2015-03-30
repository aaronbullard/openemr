<?php namespace Aaronbullard\Exceptions;

use Exception;

class ForbiddenException extends HttpException {
	const HTTP_CODE = 403;
	const DESCRIPTION = "The request was a valid request, but the server is refusing 
		to respond to it. Unlike a 401 Unauthorized response, authenticating 
		will make no difference.";
}