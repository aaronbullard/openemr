<?php namespace Aaronbullard\Restful\Decorators;

use Aaronbullard\Restful\Interfaces\DataInterface;

class Data extends JsonDecorator implements DataInterface {

	protected $data;

	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}

	public function getData()
	{
		return $this->data;
	}

	/**
	 * {@inheritDoc}
	 */
	public function respond(array $data = [], $http_code = 200, array $headers = [])
	{
		$data['data'] = $this->getData() ?: $data;

		return $this->responder->respond($data, $http_code, $headers);
	}

}