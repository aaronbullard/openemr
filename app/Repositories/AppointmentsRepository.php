<?php namespace OEMR\Repositories;

use Aaronbullard\CrudOps\Repository;
use OEMR\Models\Appointment;

class AppointmentsRepository extends Repository {

	public function __construct(Appointment $model)
	{
		parent::__construct($model);
	}
}