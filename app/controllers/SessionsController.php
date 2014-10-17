<?php

class SessionsController extends BaseController{

	public function store(){
		if(Auth::attempt(Input::only('email','password'))){
			return "Welcome " . Auth::user()->username;
		}
		return Redirect::back()->withInput();
	}

	public function destroy(){
		Auth::logout();
		return Redirect::to('login');
	}

}