<?php

class EventsController extends BaseController{
	protected $eventList;

	public function __construct(EventList $eventList){
		$this->eventList = $eventList;
	}

	public function index(){
		$eventLists = EventList::with('EventType')->where('date', '>=', new DateTime('today'))->orderBy('date','desc')->get();
		if(Auth::check() && Auth::user()->user_type == 1) {
		 	return View::make('admin/events', ['eventLists'=>$eventLists, 'event'=>"Upcoming"]);
	    }
	    if(Auth::check() && Auth::user()->user_type == 0) {
			return View::make('volunteer/events', ['eventLists'=>$eventLists, 'event'=>"Upcoming"]);
		}
		return View::make('public/events',['eventLists'=> $eventLists, 'event'=>"Upcoming"]);
	}
	public function showPastEvents(){

		$eventLists = EventList::with('EventType')->where('date', '<', new DateTime('today'))->orderBy('date','desc')->get();
		if(Auth::check() && Auth::user()->user_type == 1) {
			return View::make('admin/events', ['eventLists'=>$eventLists, 'event'=>"Past"]);
		}
		if(Auth::check() && Auth::user()->user_type == 0) {
			return View::make('volunteer/events', ['eventLists'=>$eventLists, 'event'=>"Past"]);
		}
		return View::make('public/events',['eventLists'=> $eventLists, 'event'=>"Past"]);
	}

	public function show(){
		return View::make('events');
	}

	public function sortPast(){
		$eventID = Input::get('event_id');
		$eventLists = EventList::with('EventType')->where('event_id', '=', $eventID)->
													where('date', '<', new DateTime('today'))->
													orderBy('date', 'desc')->get();
		$eventLists->type_id = $eventID;
		$eventLists->sortByDesc('event_id');
		if($eventID == 0){
			$eventLists = EventList::with('EventType')->where('date', '<', new DateTime('today'))->
			orderBy('date', 'DESC')->get();
		}
		return View::make('public/events', ['eventLists'=> $eventLists, 'event'=>"Past"]);
	}

	public function sortFuture(){
		$eventID = Input::get('event_id');
		$eventLists = EventList::with('EventType')->where('event_id', '=', $eventID)->
													where('date', '>=', new DateTime('today'))->get();
		$eventLists->type_id = $eventID;
		if($eventID == 0){
			$eventLists = EventList::with('EventType')->where('date', '>=', new DateTime('today'))->get();
		}
		return View::make('public/events', ['eventLists'=> $eventLists, 'event'=>"Upcoming"]);
	}

	public function sortDate(){
		$date =  date("Y-m-d", strtotime(Input::get('time')));
		//$eventLists = EventList::where('date', '=', $date)->get();
		$theEvent = DB::table('events')->where('date', '=', $date)->pluck('event_id');
		// $eventLists->type_id = DB::table('events')->where('date','=',$date)->pluck('type_id');
		$eventLists = EventList::with('EventType')->where('event_id', '=', $theEvent)->get();
		$event = ($date < new DateTime('today')) ? "Past" : "Upcoming";
		return View::make('public/events', ['eventLists'=> $eventLists, 'event'=>$event]);
	}

	public function store(){
		
		$input = Input::all();
		$eventList = new EventList;
		$eventList->location = $input['location'];
		$type_id = $input['eventType'];
		if($type_id == 0){
			$newName = Input::get('other');

			$eventtype = new EventType;
			$eventtype->type_name = $newName;
			$eventtype->save();
			$eventList->type_id = $eventtype->type_id;
		}
		else{
			$eventList->type_id = $type_id;
		}
		$eventList->description = Input::get('description');
		$eventList->date = date("Y-m-d", strtotime(Input::get('eventDate')));
	
		$eventList->save();
		return Redirect::back()->with('message', 'Event created');
	}

	public function destroy(){
		$event_id = Input::get('event_id');
		$eventList = EventList::find($event_id);
		$eventList->delete();
		return Redirect::back();
	}
	//for test
	public function edit($event_id){
		$eventList = EventList::findOrFail($event_id);
		return View::make('admin/edit',['eventList'=> $eventList]);
	}

	public function update($event_id){
		$eventList = EventList::find($event_id);
		$eventList->location = Input::get('location');
		if(Input::get('eventType') != ''){
			$type_id = Input::get('eventType') ;		
			if($type_id == 0){
				$newName = Input::get('other');
				$eventtype = new EventType;
				$eventtype->type_name = $newName;
				$eventtype->save();

				$eventList->type_id = $eventtype->type_id;
			}
			else{
				$eventList->type_id = $type_id;
			}
		}
		$eventList->description = Input::get('description');
		$eventList->date = date("Y-m-d", strtotime(Input::get('date')));	
		$eventList->save();
		$check =  date("Y-m-d");
      	if($eventList->date < $check){
			return Redirect::to('pastEvents');
		}
		else{
			return Redirect::to('events');
		}
	}
}