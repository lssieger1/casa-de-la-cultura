<?php

class ParticipantsController extends BaseController{
	protected $participant;

	public function __construct(Participant $participant){
		$this->participant = $participant;
	}

	
	public function show(){
		$participants = $this->participant->all();
		$event_id = Input::get('event_id');
		return View::make('volunteer/attendance',['participants'=> $participants, 'event_id'=>$event_id]);
	}

	public function store(){	
		$input = Input::all();
		if( ! $this->participant->fill($input)->isValid() ){
			return Redirect::back()->withErrors($this->eventList->messages);
		}
		
		$participant = new Participant;
		
		//$participant->fname = Input::get('fname');
		//$participant->mname = Input::get('mname');
		//$participant->lname = Input::get('lname');
		//$participant->gender = Input::get('gender');
		//$participant->dob = '20141104'//Input::get('dob');
		//$participant->nationality = Input::get('nationality');
		//$participant->address = Input::get('address');
		//$participant->native_lang = Input::get('native_lang');
		//$participant->other_lang = Input::get('other_lang');
		//$participant->houseHoldID = Input::get('houseHoldID');
		//$participant->phoneNo = Input::get('phoneNo');
		//$participant->email = Input::get('email');
		$participant->fill($input);
		$participant->save();
		return Redirect::to('/attendance')->with('message', 'New participant created');
	}

}