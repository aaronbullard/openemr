<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\TestDummy\Factory as TestDummy;

class DatabaseSeeder extends Seeder {

	private $users = [];
	private $patients = [];
	private $pNotes = [];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->seedUsers();
		$this->seedPatients();
		$this->seedPnotes();
	}

	private function seedUsers()
	{
		$this->users = TestDummy::times(10)->create('OEMR\\Models\\User');
	}

	private function seedPatients()
	{
		$this->patients = TestDummy::times(500)->create('OEMR\\Models\\Patient');
	}

	private function seedPnotes()
	{
		foreach($this->patients as $patient)
		{
			$this->pNotes[] = TestDummy::times(3)->create('OEMR\\Models\\Pnote', ['pid' => $patient->id]);
		}
	}
}
