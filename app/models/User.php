<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	//hasMany();
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	public static $rules =[
		'username' => 'required',
		'email' => 'required',
		'password' => 'required'
	];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $primaryKey = 'id';
	protected $fillable = ['username', 'email', 'password', 'name', 'phoneNo'];


	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes()){
			return true;
		}
		$this->messages = $validation->messages();
		return false;
	}
}
