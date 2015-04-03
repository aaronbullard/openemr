<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\TestDummy\Factory as TestDummy;
use OEMR\Models\Patient;

class DatabaseSeeder extends Seeder {

	protected static $pids = [4161, 4162, 4163, 4164, 4165, 4166, 4167, 4168];

	private $users = [];
	private $patients = [];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->users = $this->seedUsers(3);
		$this->patients = $this->seedPatients(8);

		foreach($this->patients as $patient)
		{
			$this->seedPnotes($patient, 3);
			$this->seedAppointments($patient, 2);
		}
		
	}

	private function seedUsers($count)
	{
		return TestDummy::times($count)->create('OEMR\\Models\\User');
	}

	private function seedPatients($count)
	{
		$pid = static::$pids[0];

		// Make first 8
		while($count--)
		{
			$patients[] = TestDummy::create('OEMR\\Models\\Patient', ['pid' => $pid]);
			$pid++;
		}

		return $patients;
	}

	private function seedPnotes(Patient $patient, $count)
	{
		return TestDummy::times($count)->create('OEMR\\Models\\Pnote', ['pid' => $patient->pid]);
	}

	private function seedAppointments(Patient $patient, $count)
	{
		return TestDummy::times($count)->create('OEMR\\Models\\Appointment', ['pc_pid' => $patient->pid]);
	}
}
