<?php namespace OEMR\Repositories;

use Aaronbullard\CrudOps\Repository;
use OEMR\Models\Patient;

class PatientsRepository extends Repository {

	public function __construct(Patient $model)
	{
		parent::__construct($model);
	}
}