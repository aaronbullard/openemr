<?php namespace OEMR\Models;



class Document extends Model {

	public function list()
	{
		return $this->belongsTo('OEMR\\Model\\List');
	}

	public function encounter()
	{
		return $this->belongsTo('OEMR\\Model\\Encounter');
	}
}
