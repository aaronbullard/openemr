<?php namespace Aaronbullard\Restful\Decorators;

use Aaronbullard\Restful\Interfaces\MetaInterface;

class Meta extends JsonDecorator implements MetaInterface {

	protected $meta = [];

	public function addMeta($key, $value)
	{
		$this->meta[$key] = $value;

		return $this;
	}

	public function setMeta(array $meta)
	{
		$this->meta = $meta;

		return $this;
	}

	public function getMeta()
	{
		return $this->meta;
	}

	/**
	 * {@inheritDoc}
	 */
	public function respond(array $data = [], $http_code = 200, array $headers = [])
	{
		$data['meta'] = $this->getMeta();

		return $this->responder->respond($data, $http_code, $headers);
	}

}