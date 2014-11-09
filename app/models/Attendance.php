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
	
	public static $rules =[
		'event_id' => 'required',
		'part_id' => 'required'
	];

	public $messages;
	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes()){
			return true;
		}
		$this->messages = $validation->messages();
		return false;
	}

}