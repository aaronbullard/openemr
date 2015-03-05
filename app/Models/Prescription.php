<?php namespace OEMR\Models;



class Prescription extends Model {

	public function patient()
	{
		return $this->belongsTo('OEMR\\Models\\Patient');
	}

}
