<?php 
class UsersController extends BaseController {

	//constructor
	public function __construct(User $user){
		$this->user = $user;
	}

	public function postSignIn() {
	}

}