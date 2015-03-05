<?php namespace OEMR\Http\Controllers;

use OEMR\Http\Requests;
use OEMR\Http\Controllers\Controller;
use OEMR\Repositories\UsersRepository;
use OEMR\Transformers\UserTransformer;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct(UsersRepository $repo, UserTransformer $transformer)
	{
		parent::__construct($repo, $transformer);
	}

}
