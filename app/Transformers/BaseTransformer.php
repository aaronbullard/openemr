<?php namespace OEMR\Transformers;

use DateTime;
use Aaronbullard\Transformers\Transformer;

class BaseTransformer extends Transformer {

	public function transformObject($model)
	{
		return $model->toArray();
	}

	public static function castToIntegers(array &$obj, array $fields)
	{
		foreach($fields as $field)
		{
			if( ! isset($obj[$field]))
				continue;

			$obj[$field] = (int)$obj[$field];
		}
	}

	public static function castToUnixTimestamps(array &$obj, array $fields)
	{
		foreach($fields as $field)
		{
			if( ! isset($obj[$field]))
				continue;
			
			if( is_a($obj[$field], 'DateTime'))
			{
				$obj[$field] = $obj[$field]->format('Y-m-d H:i:s');
			}

			$obj[$field] = strtotime( $obj[$field] );
		}
	}

}