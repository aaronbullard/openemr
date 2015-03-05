<?php namespace OEMR\Repositories;

use Aaronbullard\CrudOps\Repository;
use OEMR\Models\User;

class UsersRepository extends Repository {

	public function __construct(User $model)
	{
		parent::__construct($model);
	}
}