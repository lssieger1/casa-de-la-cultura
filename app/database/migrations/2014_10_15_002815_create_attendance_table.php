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
			$table->engine='InnoDB';
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')->references('type_id')->on('eventtype');
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('event_id')->on('events')
					->onDelete('cascade')
					->onUpdate('cascade');
			$table->integer('part_id')->unsigned();
			$table->foreign('part_id')->references('part_id')->on('participants');
			$table->primary(array('event_id', 'part_id'));
			
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
