<?php namespace OEMR\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Aaronbullard\Exceptions\UnprocessableEntityException;

abstract class Request extends FormRequest {

	/**
	 * Get the proper failed validation response for the request.
	 *
	 * @param  array  $errors
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function response(array $errors)
	{
		$e = new UnprocessableEntityException("Form validation.");
		
		$e->setErrors( $errors );

		throw $e;
	}
}
