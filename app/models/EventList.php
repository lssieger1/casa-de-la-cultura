<?php
//layer
//what is model? knowledge of our domain

class EventList extends Eloquent {
	
	//belongsTo();
	
	public $timestamps = false;

	public static $rules =[
		'location' => 'required',
		'date' => 'required'
	];

	public $messages;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';
	protected $fillable = ['location','name','date','description'];
	protected $primaryKey = 'event_id';

	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes()){
			return true;
		}
		$this->messages = $validation->messages();
		return false;
	}
}