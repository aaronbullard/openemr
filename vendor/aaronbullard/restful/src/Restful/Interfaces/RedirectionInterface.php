<?php namespace Aaronbullard\Restful\Interfaces;

interface RedirectionInterface {
	/**
	 * Pop the next redirect url from next hightest priority.
	 * @return string Redirect Url
	 */
	public function getRedirection();

	/**
	 * Push a Url redirect onto the session
	 * @param string  $url      Redirect Url
	 * @param integer $priority 1 = low to 99 = high
	 * @return self
	 */
	public function setRedirection($url, $priority = 1);

	/**
	 * Remove the redirect request.
	 * @return self
	 */
	public function removeRedirection();
}