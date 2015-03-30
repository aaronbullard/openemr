<?php namespace Aaronbullard\CrudOps;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Aaronbullard\Restful\ResponseTrait;
use Aaronbullard\Transformers\Transformer;
use Aaronbullard\CrudOps\Repository;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests, ResponseTrait;

	protected static $resourceUri;

	protected static $parentResourceUri;

	protected static $createCommand;

	protected static $updateCommand;

	protected $repo;

	protected $transformer;

	public function __construct(Repository $repo, Transformer $transformer)
	{
		$this->repo = $repo;
		$this->transformer = $transformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$limit  = $request->input('limit', 20);
		$offset  = $request->input('offset', 0);

		$parentId = $this->getRouteResourceValue($request, static::$parentResourceUri); // Returns null if not existing

		$collection = is_null($parentId) ? $this->repo->getAll($limit, $offset) : $this->repo->getByParentId($parentId, $limit, $offset);

		$data = $this->transformer->transform( $collection );

		$meta = $this->repo->getMetaArray();

		return $this->getResponder()->setMeta($meta)->respondOk($data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeNewObject($request, array $extras = [])
	{
		$object = $this->dispatchFrom($this->getCreateCommand(), $request, $extras);

		$data = $this->transformer->transform( $object );

		return $this->getResponder()->respondCreated($data);
	}

	public function updateObject($request, array $extras = [])
	{
		$object = $this->dispatchFrom($this->getUpdateCommand(), $request, $extras);

		$data = $this->transformer->transform( $object );

		return $this->getResponder()->respondOk($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request)
	{
		$id = $this->getRouteResourceValue($request, static::$resourceUri);

		$object = $this->repo->findById( $id );

		$data = $this->transformer->transform( $object );

		return $this->getResponder()->respondOk($data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
		$id = $this->getRouteResourceValue($request, static::$resourceUri);

		$object = $this->repo->findById( $id );

		$this->repo->delete( $object );

		return $this->getResponder()->respondOk("Record destroyed.");
	}

	protected function getCreateCommand()
	{
		return static::$createCommand;
	}

	protected function getUpdateCommand()
	{
		return static::$updateCommand;
	}

	protected function getRouteResourceValue(Request $request, $resource)
	{
		foreach( $request->segments() as $index => $segment)
		{
			if($segment === $resource)
			{
				$ele = $index + 2;

				return $request->segment($ele);
			}
		}

		return NULL;
	}

}
