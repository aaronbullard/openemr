<?php namespace OEMR\Transformers;


class AppointmentTransformer extends BaseTransformer {

	public function transformObject($appt)
	{
		return [
			'id' => (int) $appt->pc_eid,
			'patient_id' => (int) $appt->pc_pid,
			'category_id' => $appt->pc_catid,
			'provider_id' => $appt->informant,
			'title' => $appt->pc_title,
			'time' => $appt->pc_time,
			'status' => $appt->pc_apptstatus,
			'facility_id' => (int) $appt->pc_facility,
			'facility' => $appt->facility,
			'comment' => $appt->pc_hometext
		];
	}

}