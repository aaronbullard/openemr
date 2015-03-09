<?php namespace OEMR\Http\Requests;

use OEMR\Http\Requests\Request;

class AppointmentCreateRequest extends Request {

	protected static $apptRules = [
		'patient_id' => ['required'],
		'category_id' => ['required', 'exists:openemr_postcalendar_categories,pc_catid'],
		'provider_id' => ['required', 'exists:users,id'],
		'title' => ['required'],
		'time' => ['required', 'date_format:Y-m-d H:i:s', 'after:NOW'],
		'status' => ['exists:list_options,option_id'],
		'facility_id' => ['required', 'exists:facility,id'],
		'comment' => []
	];

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

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
