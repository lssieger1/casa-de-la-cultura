<?php

class ParticipantsController extends BaseController{
	protected $participant;

	public function __construct(Participant $participant){
		$this->participant = $participant;
	}

	//List all participants
	public function index($event_id){
		$type_id = DB::table('events')->where('event_id','=',$event_id)->pluck('type_id');
		$test = DB::table('attendance')->where('type_id','=',$type_id)->lists('part_id');
		if($test != null){
			$participants =  Participant::whereNotIn(
		 				'part_id', $test)
		 		  		 ->select('part_id','fname','lname','phoneNo','dob','address')
		 		  		 ->distinct()
		 		  		->get();
		}else{
		    $participants = $this->participant->all();
		}
		$eventList = EventList::with('EventType')->find($event_id);
		return View::make('volunteer/browseAllParticipants',['participants'=> $participants, 'event_id'=>$event_id, 'event'=>$eventList]);
	}

	//Show all participants
	public function show($event_id){
		$participants = $this->participant->all();
		$eventList = EventList::with('EventType')->find($event_id);
		return View::make('volunteer/attendance',['participants'=> $participants, 'event'=>$eventList, 'event_id'=>$event_id]);
	}

	//Create a new participant
	public function store(){	
		$input = Input::all();
		if( ! $this->participant->fill($input)->isValid() ){
			return Redirect::back()->withInput()->withErrors($this->participant->messages);
		}		
		$participant = new Participant;
		$participant->fill($input);
		$participant->gender = Input::get('gender');
		$participant->dob = date("Y-m-d", strtotime(Input::get('registerDateOfBirth')));
		$participant->save();

		return Redirect::back()->with('message', 'New participant created');
	}

	//Find all other participants
	public function browseAll($event_id){
		$attendance = new Attendance;
		$type_name = Input::get('eventType');
		$type_id = EventList::find($event_id)->type_id;
		$attendance->type_id = $type_id;
		$attendance->event_id = $event_id;
		$attendance->part_id = Input::get('part_id');
		$attendance->save();

		return Redirect::back();
	}

	//Edit participants' information
	public function edit($event_id,$part_id){
		$participant = Participant::find($part_id);
		return View::make('volunteer/edit', ['participant' => $participant, 'event_id' => $event_id]);
	}

	//Update existing participant
	public function update($part_id){
		$participant = Participant::findOrFail($part_id);
		$participant->fname = Input::get('fname');
		$participant->mname = Input::get('mname');
		$participant->lname = Input::get('lname');
		$participant->gender = Input::get('gender');
		$participant->dob =  date("Y-m-d", strtotime(Input::get('dob')));
		$participant->nationality = Input::get('nationality');
		$participant->address = Input::get('address');
		$participant->native_lang = Input::get('native_lang');
		$participant->other_lang = Input::get('other_lang');
		$participant->guardian = Input::get('guardian');
		$participant->phoneNo = Input::get('phoneNo');
		$participant->email = Input::get('email');
		$participant->city = Input::get('city');
		$participant->state = Input::get('state');

		$participant->save();

		$event_id = Input::get('event_id');
		$add = 'attendance/'.$event_id.'';
		return Redirect::to($add);
	}
}