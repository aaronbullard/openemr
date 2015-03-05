<?php namespace OEMR\Transformers;

use Aaronbullard\Transformers\Transformer;

class PatientTransformer extends Transformer {

	public function transformObject($patient)
	{
		$array = $patient->toArray();

		return $array;
	}

}