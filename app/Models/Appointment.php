<?php namespace OEMR\Models;



class Appointment extends Model {

	protected $table = "openemr_postcalendar_events";

	protected $primaryKey = 'pc_eid';

	public $dates = ['pc_time'];

	private static $modelMappings = [
		'pc_pid' => 'patient_id',
		'pc_title' => 'title',
		'pc_time' => 'time',
		'pc_hometext' => 'comment',
		'pc_informant' => 'provider_id',
		'pc_facility' => 'facility_id',
		'pc_apptstatus' => 'status'
	];

	public function patient()
	{
		return $this->belongsTo('OEMR\\Models\\Patient', 'pc_pid');
	}

	public function facility()
	{
		return $this->belongsTo('OEMR\\Models\\Facility', 'pc_facility');
	}

	public static function build(array $params = [])
	{
		$obj = new static;
	
		static::mapParams($obj, $params);

		return $obj;
	}

	public function updateAppt(array $params = [])
	{
		static::mapParams($this, $params);

		return $this;
	}

	private static function mapParams(Appointment $obj, array $params = [])
	{
		foreach(static::$modelMappings as $column => $attr)
		{
			if(isset($params[$attr]))
			{
				$obj->{$column} = $params[$attr];
			}
		}

		return $obj;
	}

}
