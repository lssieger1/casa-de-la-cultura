<?php

class SessionsController extends BaseController{

	public function create(){
		return View::make('public.signin');
	}	
	
	public function store(){
		if(Auth::attempt(Input::only('username','password'))){
			return Redirect::to('events');
		}
		else{
			Session::flash('loginError','Invalid credentials. Plase try again.');
			return Redirect::back()->withInput();
		}
	}

	public function destroy(){
		Auth::logout();
		return Redirect::to('signin');
	}

}