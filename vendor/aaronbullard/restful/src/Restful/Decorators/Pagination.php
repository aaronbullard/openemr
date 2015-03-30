<?php namespace Aaronbullard\Restful\Decorators;

use Illuminate\Pagination\Paginator;
use Aaronbullard\Restful\ResponderException;
use Aaronbullard\Restful\Interfaces\PaginationInterface;

class Pagination extends JsonDecorator implements PaginationInterface {

	protected $paginator;

	public function setPagination(Paginator $paginator)
	{
		$this->paginator = $paginator;

		return $this;
	}

	public function getPagination()
	{
		return $this->paginator;
	}

	/**
	 * {@inheritDoc}
	 */
	public function respond(array $data = [], $http_code = 200, array $headers = [])
	{
		if( $paginator = $this->getPagination() )
		{
			foreach($paginator->toArray() as $attr => $value)
			{
				$data['meta'][$attr] = $value;
			}	
		}
		

		return $this->responder->respond($data, $http_code, $headers);
	}

}