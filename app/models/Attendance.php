<?php
//layer
//what is model? knowledge of our domain

class Attendance extends Eloquent {
	
	
	public $timestamps = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attendance';
	//protected $primaryKey = 'event_id', 'part_id';


}