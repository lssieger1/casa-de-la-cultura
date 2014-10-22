<?php 
class UsersController extends BaseController {

	//constructor
	public function __construct(User $user){
		$this->user = $user;
	}

	//sign in and check whether he is an admin or a volunteer
	public function postSignIn() {
		
	}

}