<?php
//layer
//what is model? knowledge of our domain

class EventList extends Eloquent {
	
	public function eventType()
	{
    return $this->belongsTo('EventType', 'type_id');
	}
	public function events()
    {
        return $this->hasMany('Attendance','event_id');
    }
	
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

	public function get_date() {
		return date('d F Y', strtotime($this->date));
	}
}