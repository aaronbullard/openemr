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

}
