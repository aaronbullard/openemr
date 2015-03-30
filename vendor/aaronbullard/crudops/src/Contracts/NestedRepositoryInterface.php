<?php namespace Aaronbullard\CrudOps\Contracts;

interface NestedRepositoryInterface {
	public function getByParentId($parentId, $limit = NULL, $offset = NULL);
}