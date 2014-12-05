<?php

class ParticipantsController extends BaseController{
	protected $participant;

	public function __construct(Participant $participant){
		$this->participant = $participant;
	}

	public function index($event_id){
		$type_id = DB::table('events')->where('event_id','=',$event_id)->pluck('type_id');
		$participants =  Participant::whereNotIn(
						'part_id',DB::table('attendance')->where('type_id','=',$type_id)->lists('part_id'))
				  		 ->select('part_id','fname','lname','phoneNo','dob','address')
				  		 ->distinct()
				  		->get();

		return View::make('volunteer/browseAllParticipants',['participants'=> $participants, 'event_id'=>$event_id]);
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

		return Redirect::back()->with('message', 'New participant created');
	}

	public function browseAll($event_id){
		$attendance = new Attendance;
		$type_name = Input::get('eventType');
		$type_id = DB::table('events')->where('event_id','=',$event_id)->pluck('type_id');//EventList::find($event_id)->type_id;
		$attendance->type_id = $type_id;
		$attendance->event_id = $event_id;
		$attendance->part_id = Input::get('part_id');
		$attendance->save();

		return Redirect::to('attendance/'.$event_id.'');
	}
}