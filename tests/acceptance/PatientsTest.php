<?php

use Laracasts\TestDummy\Factory as TestDummy;

class PatientsTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \AcceptanceTester
	 */
	protected $tester;

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
		$patients = $this->testGetIndex();
		$patient = $patients[3];

		$this->tester->sendGET("/patients/{$patient['pid']}");
		$this->tester->seeResponseCodeIs(200);
		$patient = $this->tester->grabDataFromJsonResponse('data');
		$this->assertEquals($patient['pid'], $patient['pid']);

		return $patient;
	}

}