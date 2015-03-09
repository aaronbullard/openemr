<?php namespace OEMR\Http\Controllers;

use OEMR\Http\Requests;
use OEMR\Http\Controllers\Controller;
use OEMR\Http\Requests\AppointmentCreateRequest;
use OEMR\Models\Appointment;
use OEMR\Repositories\AppointmentsRepository;
use OEMR\Transformers\AppointmentTransformer;
use OEMR\Events\AppointmentWasCreated;

use Illuminate\Http\Request;

class AppointmentController extends Controller {

	public function __construct(AppointmentsRepository $repo, AppointmentTransformer $transformer)
	{
		parent::__construct($repo, $transformer);
	}

	public function store(AppointmentCreateRequest $request)
	{
		$params = $request->only(
			'patient_id',
			'category_id',
			'provider_id',
			'title',
			'time',
			'status',
			'facility_id',
			'comment'
		);

		$appt = Appointment::build($params);

		$this->repo->save( $appt );

		event( new AppointmentWasCreated( $appt ));

		$data = $this->transformer->transform( $appt );

		return $this->getResponder()->respondCreated( $data );
	}

	public function update(Request $request, $apptId)
	{
		$appt = $this->repo->findById( $apptId );

		$params = $request->only(
			'title',
			'time',
			'status',
			'facility_id',
			'comment'
		);

		$appt->updateAppt($params);

		$this->repo->save( $appt );

		$data = $this->transformer->transform( $appt );

		return $this->getResponder()->respondOk( $data );
	}

	public function destroy(Request $request, $apptId)
	{
		$appt = $this->repo->findById( $apptId );

		$this->repo->delete( $appt );

		return $this->getResponder()->respondOk( "Appointment was deleted." );
	}
}
