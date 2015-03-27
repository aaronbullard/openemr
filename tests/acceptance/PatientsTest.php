<?php

use Laracasts\TestDummy\Factory as TestDummy;

class PatientsTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \AcceptanceTester
	 */
	protected $tester;

	protected $_patientId = 6;

	// tests
	public function testGetIndex()
	{
		$this->tester->sendGET("/patients");
		$this->tester->seeResponseCodeIs(200);
		$patients = $this->tester->grabDataFromJsonResponse('data');

		$this->assertCount(20, $patients);

		return $patients;
	}


	public function testGetPatient()
	{
		$this->tester->sendGET("/patients/$this->_patientId");
		$this->tester->seeResponseCodeIs(200);
		$patient = $this->tester->grabDataFromJsonResponse('data');
		$this->assertEquals($this->_patientId, $patient['id']);

		return $patient;
	}

}