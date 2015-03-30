<?php namespace Aaronbullard\CrudOps\Contracts;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface {
	public function findById($id);
	public function getAll($limit = NULL, $offset = NULL);
	public function save(Model $model);
	public function delete(Model $model);
	public function getMetaArray();
}