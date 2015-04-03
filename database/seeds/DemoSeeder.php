<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\TestDummy\Factory as TestDummy;
use OEMR\Models\Patient;

class DemoSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->seedDemoUsers();
	}

	private function seedDemoUsers()
	{
		$filepath = __DIR__ . '/patients_2015-04-03.sql';
		DB::unprepared(file_get_contents($filepath));
	}

}
