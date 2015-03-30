<?php namespace OEMR\Transformers;

class PatientTransformer extends BaseTransformer {

	public function transformObject($patient)
	{
		$array = $patient->toArray();

		static::castToIntegers($array, ['id', 'drivers_license', 'pharmacy_id', 'providerID', 'ref_providerID', 'pid', 'fitness']);

		// make unix
		static::castToUnixTimestamps($array, ['date', 'financial_review', 'regdate', 'contrastart', 'ad_reviewed', 'deceased_date']);

		return $array;
	}

}