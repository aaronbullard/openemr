<?php namespace Aaronbullard\Restful\Decorators;

use Aaronbullard\Restful\ResponderException;
use Aaronbullard\Restful\Interfaces\StatusInterface;

class Status extends JsonDecorator implements StatusInterface {

	protected $status = 'success';

	public function setStatus($status)
	{
		if( ! in_array($status, ['success', 'error']))
		{
			throw new ResponderException("Status argument must either be 'success' or 'error'.");
		}

		$this->status = $status;

		return $this;
	}

	public function getStatus()
	{
		return $this->status; 
	}

	/**
	 * {@inheritDoc}
	 */
	public function respond(array $data = [], $http_code = 200, array $headers = [])
	{
		$data['status'] = $this->getStatus();

		return $this->responder->respond($data, $http_code, $headers);
	}

}