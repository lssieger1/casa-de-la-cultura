<?php
//layer
//what is model? knowledge of our domain
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Participant extends Eloquent implements UserInterface, RemindableInterface {
	

	use UserTrait, RemindableTrait;
	
	public $timestamps = false;

	public static $rules =[
		//'lname' => 'required',
		//'fname' => 'required'
	];

	public $messages;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'participants';
	protected $fillable = ['fname','mname','lname','dob','gender','nationality','address','native_lang','other_lang','houseHoldID','phoneNo','email','schoolDistrict'];


	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes()){
			return true;
		}
		$this->messages = $validation->messages();
		return false;
	}

}