<?php namespace OEMR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Aaronbullard\Restful\ResponseTrait;
use Aaronbullard\CrudOps\Repository;
use Aaronbullard\Transformers\Transformer;


abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests, ResponseTrait;

	protected $repo;

	protected $transformer;

	public function __construct(Repository $repo, Transformer $transformer)
	{
		$this->repo = $repo;
		$this->transformer = $transformer;
	}

	public function index(Request $request)
	{
		$limit = $request->get('limit', 20);
		$offset = $request->get('offset', 0);

		$collection = $this->repo->getAll($limit, $offset);

		$data = $this->transformer->transform( $collection );

		return $this->getResponder()->setMeta($this->repo->getMetaArray())->respondOk( $data );
	}

	public function show($id)
	{
		$obj = $this->repo->findById($id);

		$data = $this->transformer->transform( $obj );

		return $this->getResponder()->setMeta($this->repo->getMetaArray())->respondOk( $data );
	}

}
