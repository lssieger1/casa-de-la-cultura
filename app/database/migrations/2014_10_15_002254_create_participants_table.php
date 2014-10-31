<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('participants', function(Blueprint $table)
		{
			$table->increments('part_id')->unsigned();
			$table->string('fname');
			$table->string('mname');
			$table->string('lname');
			$table->string('gender');
			$table->date('dob');
			$table->string('pob');
			$table->string('nationality');
			$table->string('address');
			$table->string('native_lang');
			$table->string('other_lang');
			$table->integer('householdID')->unsigned();
			$table->string('phoneNo');
			$table->string('email');
			$table->string('schoolDistrict');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('participants');
	}

}
