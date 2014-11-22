<?php
//layer
//what is model? knowledge of our domain
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class EventType extends Eloquent implements UserInterface, RemindableInterface {
	

	use UserTrait, RemindableTrait;
	
	public $timestamps = false;

	public static $rules =[
		'type_name' => 'required'
	];

	public $messages;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'eventtype';
	protected $fillable = ['type_name'];
	protected $primaryKey = 'type_id';
    public function events()
    {
        return $this->hasMany('EventList', 'type_id');
    }
    public function eventTypes()
    {
        return $this->hasMany('Attendance', 'type_id');
    }

	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes()){
			return true;
		}
		$this->messages = $validation->messages();
		return false;
	}

}