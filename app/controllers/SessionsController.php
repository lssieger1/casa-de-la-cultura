<?php

class SessionsController extends BaseController{

	public function create(){
		return View::make('public.signin');
	}	
	 
	public function store(){
		if(Auth::attempt(Input::only('username','password'))){
			if(Auth::user()->user_type == 1){
				return View::make('admin.create');
				return "Welcome " . Auth::user()->username;
			}
			return View::make('public.events');
		}
		else{
			echo "Failed";
			return Redirect::back()->withInput();
		}
	}

	public function destroy(){
		Auth::logout();
		return Redirect::to('public.signin');
	}

}