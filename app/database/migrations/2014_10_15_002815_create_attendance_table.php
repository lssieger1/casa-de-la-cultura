<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attendance', function(Blueprint $table)
		{
			$table->integer('event_id')->unsigned();
			//$table->primary('event_id');
			$table->foreign('event_id')->references('event_id')->on('events');
			$table->integer('part_id')->unsigned();
			$table->foreign('part_id')->references('part_id')->on('participants');
			$table->primary(array('event_id', 'part_id'));
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
		Schema::drop('attendance');
	}

}