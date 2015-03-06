<?php namespace OEMR\Http\Requests;

use OEMR\Http\Requests\Request;

class PnoteCreateRequest extends Request {

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
		return [
			'body' => 'required',
			'title' => 'required|in:Chart Note',
			'assigned_to' => ''
		];
	}

}
