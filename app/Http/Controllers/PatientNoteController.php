<?php namespace OEMR\Http\Controllers;

use OEMR\Http\Requests;
use OEMR\Http\Controllers\Controller;
use OEMR\Http\Requests\PnoteCreateRequest;
use OEMR\Repositories\PnoteRepository;
use OEMR\Transformers\PnoteTransformer;
use OEMR\Models\Pnote;
use OEMR\Events\PatientNoteWasCreated;

use Illuminate\Http\Request;

class PatientNoteController extends Controller {

	public function __construct(PnoteRepository $repo, PnoteTransformer $transformer)
	{
		parent::__construct($repo, $transformer);
	}

	public function index(Request $request)
	{
		$limit = $request->get('limit', 20);
		$offset = $request->get('offset', 0);

		$collection = $this->repo->getByPatientId($request->segment(2), $limit, $offset);

		$data = $this->transformer->transform( $collection );

		return $this->getResponder()->setMeta($this->repo->getMetaArray())->respondOk( $data );
	}

	public function store(PnoteCreateRequest $request)
	{
		$params = $request->only('title', 'body', 'assigned_to');

		$pnote = new Pnote;
		$pnote->fill( $params );
		$pnote->date = new \DateTime();
		$pnote->pid = $request->segment(2);
		$pnote->user = 'admin';
		$pnote->groupname = 'Default';
		$pnote->activity = 1;
		$pnote->authorized = 1;

		$this->repo->save( $pnote );

		event( new PatientNoteWasCreated( $pnote ));

		$data = $this->transformer->transform( $pnote );

		return $this->getResponder()->respondCreated( $data );
	}

	public function destroy($patientId, $noteId)
	{
		$note = $this->repo->findById( $noteId );

		$this->repo->delete( $note );

		return $this->getResponder()->respondOk( "Note was deleted." );
	}

}
