<?php namespace OEMR\Http\Requests;

use OEMR\Http\Requests\Request;

class AppointmentUpdateRequest extends Request {

	protected static $apptRules = [
		'patient_id' => [],
		'category_id' => ['exists:openemr_postcalendar_categories,pc_catid'],
		'provider_id' => ['exists:users,id'],
		'title' => [],
		'time' => ['date_format:Y-m-d H:i:s', 'after:NOW'],
		'status' => ['exists:list_options,option_id'],
		'facility_id' => ['exists:facility,id'],
		'comment' => []
	];

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return static::$apptRules;
	}

}
