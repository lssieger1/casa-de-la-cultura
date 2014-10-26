<?php
//layer
//what is model? knowledge of our domain
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class EventList extends Eloquent implements UserInterface, RemindableInterface {
	

	use UserTrait, RemindableTrait;
	
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


	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes()){
			return true;
		}
		$this->messages = $validation->messages();
		return false;
	}

}