<?php namespace OEMR\Transformers;

class PnoteTransformer extends BaseTransformer {

	public function transformObject($note)
	{
		$array = $note->toArray();

		// make ints
		static::castToIntegers($array, ['id', 'pid', 'activity', 'authorized', 'deleted']);

		// make unix
		static::castToUnixTimestamps($array, ['date']);

		return $array;
	}
}