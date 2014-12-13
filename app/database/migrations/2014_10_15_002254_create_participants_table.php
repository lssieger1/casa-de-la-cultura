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
			$table->string('nationality');
			$table->string('address');
			$table->string('native_lang');
			$table->string('other_lang');
			$table->string('guardian');
			$table->string('city');
			$table->string('state');
			$table->string('phoneNo');
			$table->string('email');
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
