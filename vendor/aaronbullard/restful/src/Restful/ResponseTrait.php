<?php namespace Aaronbullard\Restful;

use App;

trait ResponseTrait {

	public function getResponder()
	{
		return App::make('Aaronbullard\\Restful\\ResponseInterface');
	}
}
