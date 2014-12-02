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
		'name' => 'required',
		'date' => 'required',
		'other' => 'required_if_attribute: type_id, ==, EventList::count() + 1'

	];

	public $messages;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';
	protected $fillable = ['location','name','date','description', 'other'];
	protected $hidden = ['size'];
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
		return date('d M Y', strtotime($this->date));
	}
	public function setSize(){
		$this->set_attribute('size', EventList::count());
	}
}