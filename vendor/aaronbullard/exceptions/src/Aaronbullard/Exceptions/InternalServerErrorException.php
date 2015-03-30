<?php namespace Aaronbullard\Exceptions;

use Exception;

class InternalServerErrorException extends HttpException {
	const HTTP_CODE = 500;
	const DESCRIPTION = "A generic error message, given when an unexpected 
		condition was encountered and no more specific message is suitable.";
}
