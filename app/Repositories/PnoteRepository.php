<?php namespace OEMR\Repositories;

use Aaronbullard\CrudOps\Repository;
use OEMR\Models\Pnote;

class PnoteRepository extends Repository {

	public function __construct(Pnote $model)
	{
		parent::__construct($model);
	}

	public function getByPatientId($patientId, $limit = NULL, $offset = NULL)
	{
		$query = $this->model->newQuery();

		$query->where('pid', $patientId);
		
		$this->queryDecorator( $query, $limit, $offset );

		return $query->get();
	}
}