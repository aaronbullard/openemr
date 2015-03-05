<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\TestDummy\Factory as TestDummy;

class DatabaseSeeder extends Seeder {

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

		$this->seedUsers();
		$this->seedPatients();
	}

	private function seedUsers()
	{
		$this->users = TestDummy::times(10)->create('OEMR\\Models\\User');
	}

	private function seedPatients()
	{
		$this->patients = TestDummy::times(500)->create('OEMR\\Models\\Patient');
	}
}
