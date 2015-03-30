<?php

use Laracasts\TestDummy\Factory as TestDummy;

class PatientNotesTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \AcceptanceTester
	 */
	protected $tester;

	protected $_patientId;

	public function _before()
	{
		$this->tester->sendGET("/patients");
		$patients = $this->tester->grabDataFromJsonResponse('data');
		$patient = $patients[3];

		$this->_patientId = $patient['pid'];
	}

	// tests
	public function testGetRequest()
	{
		$this->tester->sendGET("/patients/$this->_patientId/notes");
		$this->tester->seeResponseCodeIs(200);
		$notes = $this->tester->grabDataFromJsonResponse('data');

		$this->assertCount(3, $notes);

		return $notes;
	}

	public function testPostRequest()
	{
		$note = [
			'title' => "Chart Note",
			'body' => "TestBody"
		];

		$this->tester->sendPOST("/patients/$this->_patientId/notes", $note);
		$this->tester->seeResponseCodeIs(201);
		$response = $this->tester->grabDataFromJsonResponse('data');

		$this->assertEquals($note['body'], $response['body']);
	}

}