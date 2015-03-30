<?php namespace OEMR\Transformers;

use Aaronbullard\Transformers\Transformer;

class PatientTransformer extends Transformer {

	public function transformObject($patient)
	{
		$array = $patient->toArray();

		// $array['appointments'] = (new AppointmentTransformer)->transform($patient->appointments()->get());

		return $array;
	}

}