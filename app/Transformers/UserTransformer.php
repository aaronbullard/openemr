<?php namespace OEMR\Transformers;

use Aaronbullard\Transformers\Transformer;

class UserTransformer extends Transformer {

	public function transformObject($user)
	{
		return $user->toArray();
	}

}