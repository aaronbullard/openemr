<?php namespace Aaronbullard\CrudOps;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Aaronbullard\CrudOps\Contracts\RepositoryInterface;
use Aaronbullard\Exceptions\NotFoundException;

abstract class Repository implements RepositoryInterface {

	protected $model;

	protected $total;
	protected $limit;
	protected $offset;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	public function findById($id)
	{
		try{
			return $this->model->findOrFail( $id );
		}
		catch(Exception $e)
		{
			throw new NotFoundException($e->getMessage(), $e->getCode(), $e);
		}
	}

	public function getAll($limit = NULL, $offset = NULL)
	{
		$query = $this->model->newQuery();

		$this->queryDecorator( $query, $limit, $offset );

		return $query->get();
	}

	public function save(Model $model)
	{
		return $model->save();
	}

	public function delete(Model $model)
	{
		return $model->delete();
	}

	public function getMetaArray()
	{
		return [
			'total' => (int) $this->total,
			'limit' => (int) $this->limit,
			'offset' => (int) $this->offset
		];
	}

	protected function queryDecorator(Builder $query, $limit, $offset)
	{
		$this->total = $query->count();

		if( ! is_null($limit) )
		{
			$this->limit = $limit;
			$query = $query->take( $limit );
		}

		if( ! is_null($offset) )
		{
			$this->offset = $offset;
			$query = $query->skip( $offset );
		}

		return $query;
	}

}