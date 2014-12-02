<?php
//layer
//what is model? knowledge of our domain

class Participant extends Eloquent{

	public function events()
    {
        return $this->hasMany('Attendance','part_id');
    }

	public $timestamps = false;

	public static $rules =[
		'lname' => 'required',
		'fname' => 'required'
	];

	public $messages;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'participants';
	protected $fillable = ['fname','mname','lname','gender','dob','nationality','address',
	'native_lang','other_lang','houseHoldID','phoneNo','email'];
	protected $primaryKey = 'part_id';

	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes()){
			return true;
		}
		$this->messages = $validation->messages();
		return false;
	}

	public function get_dob() {
		return date('d M Y', strtotime($this->dob));
	}
}