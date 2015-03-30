<?php namespace Aaronbullard\Restful\Decorators;

use Aaronbullard\Restful\ResponderException;
use Aaronbullard\Restful\Interfaces\RedirectionInterface;

class Redirection extends JsonDecorator implements RedirectionInterface {

	protected $redirect = [
		'priority'	=> 1,
		'url'		=> NULL
	];

	/**
	 * Pop the next redirect url from next hightest priority.
	 * @return string Redirect Url
	 */
	public function getRedirection()
	{
		return $this->redirect['url'];
	}

	/**
	 * Push a Url redirect onto the session
	 * @param string  $url      Redirect Url
	 * @param integer $priority 1 = low to 99 = high
	 * @return self
	 */
	public function setRedirection($url, $priority = 1)
	{
		// Check that $url is a valid url
		if(filter_var($url, FILTER_VALIDATE_URL) === FALSE)
		{
			throw new ResponderException("Redirect must be a valid url.");
		}

		// If this url has a higher or equal priority, make it the new redirect
		if( $priority >= $this->redirect['priority'] )
		{
			$this->redirect = [
				'priority'	=> $priority,
				'url'		=> $url
			];
		}

		return $this;
	}

	/**
	 * Remove the redirect request.
	 * @return self
	 */
	public function removeRedirection()
	{
		$this->redirect = [
			'priority'	=> 1,
			'url'		=> NULL
		];

		return $this;
	}

	/**
	 * {@inheritDoc}
	 */
	public function respond(array $data = [], $http_code = 200, array $headers = [])
	{
		$data['redirect'] = $this->getRedirection();

		return $this->responder->respond($data, $http_code, $headers);
	}

}