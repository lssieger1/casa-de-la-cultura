<?php

class ParticipantsController extends BaseController{
	protected $participant;

	public function __construct(Participant $participant){
		$this->participant = $participant;
	}

	
	public function show(){
		$participants = $this->participant->all();
		return View::make('volunteer/attendance',['participants'=> $participants]);
	}

	public function store(){	
		$input = Input::all();
		if( ! $this->participant->fill($input)->isValid() ){
			return Redirect::back()->withErrors($this->eventList->messages);
		}
		
		$participant = new Partcipant;
		$participant->fname = Input::get('fname');
		//$participant->mname = Input::get('mname');
		$participant->lname = Input::get('lname');
		//$participant->dob = Input::get('dob');
		//$participant->pob = Input::get('pob');
		// $participant->nationality = Input::get('nationality');
		// $participant->address = Input::get('address');
		// $participant->native_lang = Input::get('native_lang');
		// $participant->other_lang = Input::get('other_lang');
		// $participant->houseHoldID = Input::get('houseHoldID');
		// $participant->phoneNo = Input::get('phoneNo');
		// $participant->email = Input::get('email');
		// $participant->schoolDistrict = Input::get('schoolDistrict');
		
		$participant->save();
		return 'P created';
		//return Redirect::to('/attendance')->with('message', 'New participant created');
	}

}