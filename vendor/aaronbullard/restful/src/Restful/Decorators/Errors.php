<?php namespace Aaronbullard\Restful\Decorators;

use Aaronbullard\Restful\Interfaces\ErrorsInterface;

class Errors extends JsonDecorator implements ErrorsInterface {

	protected $hasErrors = FALSE;

	protected $message = "Error";

	protected $errors = [];

	public function setErrors($message, array $errors = [])
	{
		$this->hasErrors = TRUE;

		$this->message 	= $message;
		$this->errors 	= $errors;

		return $this;
	}

	public function getErrors()
	{
		return [
			'message' => $this->message,
			'errors'  => $this->errors
		];
	}

	/**
	 * {@inheritDoc}
	 */
	public function respond(array $data = [], $http_code = 200, array $headers = [])
	{
		if( $this->hasErrors )
		{
			$data['errors'] = $this->getErrors();
		}
		
		return $this->responder->respond($data, $http_code, $headers);
	}

}