<?php namespace Aaronbullard\Nesting\Services;

class RequestTranslator {

	protected $parentUri;

	protected $childUri;

	public function __construct($parentUri, $childUri)
	{
		$this->parentUri = $parentUri;
		$this->childUri = $childUri;
	}

	public function getParentId($request)
	{
		return $this->getResourceIdFromURI($request, $this->parentUri);
	}

	public function getChildId($request)
	{
		return $this->getResourceIdFromURI($request, $this->childUri);
	}

	public function isNestedResourceRoute($request)
	{
		return $this->getChildId($request) ? TRUE : FALSE;
	}

	protected function getResourceIdFromURI($request, $resource)
	{
		$segments = $request->segments();

		foreach( $segments  as $key => $segment )
		{
			if( $segment === $resource)
			{
				$index = $key + 1;

				if( ! isset($segments[$index]))
				{
					continue;
				}

				return $segments[$index];
			}
		}

		return FALSE;
	}

}