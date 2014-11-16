<?php

class ParticipantsController extends BaseController{
	protected $participant;

	public function __construct(Participant $participant){
		$this->participant = $participant;
	}

	
	public function show($event_id){
		$participants = $this->participant->all();
		return View::make('volunteer/attendance',['participants'=> $participants, 'event_id'=>$event_id]);
	}

	public function store(){	
		$input = Input::all();
		if( ! $this->participant->fill($input)->isValid() ){
			return Redirect::back()->withErrors($this->participant->messages);
		}		
		$participant = new Participant;
		$participant->fill($input);
		if(Input::get('gender') === 0){
			$participant->gender = 'Male';
		}
		elseif (Input::get('gender') === 1){
			$participant->gender = 'Female';
		}
		else{
			$participant->gender = 'Other';
		}
		$participant->save();
		return Redirect::back()->with('message', 'New participant created');
	}

}