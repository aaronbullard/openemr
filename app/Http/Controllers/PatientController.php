<?php namespace OEMR\Http\Controllers;

use OEMR\Http\Requests;
use OEMR\Http\Controllers\Controller;
use OEMR\Repositories\PatientsRepository;
use OEMR\Transformers\PatientTransformer;

use Illuminate\Http\Request;

class PatientController extends Controller {

	public function __construct(PatientsRepository $repo, PatientTransformer $transformer)
	{
		parent::__construct($repo, $transformer);
	}

	public function index(Request $request)
	{
		$searchables = $this->repo->getSearchableFields();
		$params = array_filter( $request->only( $searchables ) );

		// Use regular index controller if no search params passed
		if( empty($params))
		{
			return parent::index($request);
		}

		$limit = $request->get('limit', 20);
		$offset = $request->get('offset', 0);
		$collection = $this->repo->getWhereFieldsLike($params, $limit, $offset);

		$data = $this->transformer->transform( $collection );

		return $this->getResponder()->setMeta($this->repo->getMetaArray())->respondOk( $data );
	}
}
