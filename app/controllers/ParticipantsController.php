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
		$participant->dob = date("Y-m-d", strtotime(Input::get('registerDateOfBirth')));
		$participant->save();

		$attendance = new Attendance;
		// $event_id = 1;//Input::get('event_id');
		$type_name = Input::get('eventType');
		$type_id = DB::table('eventtype')->where('type_name','=',$type_name)->pluck('type_id');//EventList::find($event_id)->type_id;
		$attendance->type_id = $type_id;
		$event_id = DB::table('events')->where('type_id', '=', $type_id)
				  									   ->orderBy('event_id','DESC')
				  									   ->pluck('event_id');
		$attendance->event_id = $event_id;
		$attendance->part_id = $participant->part_id;
		$attendance->save();
		return Redirect::back()->with('message', 'New participant created');
	}

}