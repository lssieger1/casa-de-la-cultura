<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('ParticipantsTableSeeder');
		$this->call('FamilyTableSeeder');
		$this->call('EventTypeTableSeeder');
		$this->call('EventsTableSeeder');
		$this->call('AttendanceTableSeeder');

	}

}
