<?php namespace OEMR\Repositories;

use Exception;
use Aaronbullard\CrudOps\Repository;
use Aaronbullard\Exceptions\MethodNotAllowedException;
use Aaronbullard\Exceptions\NotFoundException;
use OEMR\Models\Patient;

class PatientsRepository extends Repository {

	protected static $searchable = [
		'who' => ['title', 'fname', 'mname', 'lname', 'DOB', 'ss', 'status', 'drivers_license']
	];

	protected $lastQuery = [];

	public function __construct(Patient $model)
	{
		parent::__construct($model);
	}

	public function getSearchableFields()
	{
		return static::$searchable['who'];
	}

	public function findByPID($pid)
	{
		$patient = $this->model->where('pid', $pid)->first();

		if( is_null($patient))
		{
			throw new NotFoundException("Patient not found.");
		}
		
		return $patient;
	}

	public function getWhereFieldsLike(array $params, $limit = NULL, $offset = NULL)
	{
		$query = $this->model->newQuery();

		$this->lastQuery = [];

		foreach($params as $field => $value)
		{
			if( ! in_array($field, $this->getSearchableFields())){
				throw new MethodNotAllowedException("$field is not a searchable field.");
			}

			$query->where($field, 'LIKE', "%$value%");

			$this->lastQuery[$field] = $value;
		}

		$this->queryDecorator( $query, $limit, $offset );

		return $query->get();
	}

	public function getMetaArray()
	{
		$array = parent::getMetaArray();
		
		$array['query'] = $this->lastQuery;

		return $array;
	}
}