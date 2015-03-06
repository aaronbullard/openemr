<?php namespace OEMR\Transformers;

use Aaronbullard\Transformers\Transformer;

class BaseTransformer extends Transformer {

	public function transformObject($model)
	{
		return $model->toArray();
	}

}