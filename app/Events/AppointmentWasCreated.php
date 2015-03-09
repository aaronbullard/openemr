<?php namespace OEMR\Events;

use OEMR\Events\Event;
use OEMR\Models\Appointment;

use Illuminate\Queue\SerializesModels;

class AppointmentWasCreated extends Event {

	use SerializesModels;

	public $appointment;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Appointment $appointment)
	{
		$this->appointment = $appointment;
	}

}
