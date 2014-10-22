<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('family', function(Blueprint $table)
		{
			$table->integer('family_id')->unsigned();
			//$table->foreign('family_id')->references('householdID')->on('participants');
			$table->string('relation');
			$table->timestamps();
			
		});
	}
///////change to household table
	/////foreign key set up--delete and update constraints
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('family');
	}

}
