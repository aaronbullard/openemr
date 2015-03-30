<?php namespace Aaronbullard\Exceptions;

use Exception;

class BadRequestException extends HttpException {
	const HTTP_CODE = 400;
	const DESCRIPTION = "The request could not be understood by the server due
		to malformed syntax. The client SHOULD NOT repeat the request without modifications.";
}