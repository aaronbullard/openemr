<?php namespace OEMR\Models;


class Patient extends Model {

	protected $table = 'patient_data';

	// protected $with = ['prescriptions'];

	public function prescriptions()
	{
		return $this->hasMany('OEMR\\Models\\Prescription');
	}
}
