<?php namespace OEMR\Events;

use OEMR\Events\Event;
use OEMR\Models\Pnote;
use Illuminate\Queue\SerializesModels;

class PatientNoteWasCreated extends Event {

	use SerializesModels;

	public $pNote;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Pnote $pNote)
	{
		$this->pNote = $pNote;
	}

}
