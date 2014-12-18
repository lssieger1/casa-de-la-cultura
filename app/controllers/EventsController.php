<?php

class EventsController extends BaseController{
	protected $eventList;

	public function __construct(EventList $eventList){
		$this->eventList = $eventList;
	}

	public function index(){
		$eventLists = EventList::with('EventType')->where('date', '>=', new DateTime('today'))->get();
		// if(Auth::user()->user_type == 1) {
		// 	return View::make('admin/events', ['eventLists'=>$eventLists]);
		// }
		return View::make('public/events',['eventLists'=> $eventLists]);
	}
	public function showPastEvents(){
		$eventLists = EventList::with('EventType')->where('date', '<', new DateTime('today'))->get();
		// if(Auth::check() && Auth::user()->user_type == 1) {
		// 	return View::make('admin/events', ['eventLists'=>$eventLists]);
		// }
		return View::make('public/events',['eventLists'=> $eventLists]);
	}
	public function showAdminEvents(){
		$eventLists = EventList::with('EventType')->where('date', '>=', new DateTime('today'))->get();
		return View::make('admin/events',['eventLists'=> $eventLists]);
	}
	public function showPastAdminEvents() {
		$eventLists = EventList::with('EventType')->where('date', '<', new DateTime('today'))->get();
		return View::make('admin/events',['eventLists'=> $eventLists]);	
	}

	public function show(){
		return View::make('events');
	}
	public function sort(){
		$eventID = Input::get('event_id');
		$eventLists = EventList::with('EventType')->where('event_id', '=', $eventID)->get();
		$eventLists->type_id = $eventID;
		if($eventID == 0){
			$eventLists = EventList::with('EventType')->where('date', '<', new DateTime('today'))->get();
		}
		return View::make('public/events', ['eventLists'=> $eventLists]);
	}

	public function store(){
		
		$input = Input::all();
		// if( ! $this->eventList->fill($input)->isValid() ){
		// 	return Redirect::back()->withErrors($this->eventList->messages);
		// }
		
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
		$input = Input::all();
		// if( ! $this->eventList->fill($input)->isValid() ){
		// 	return Redirect::back()->withErrors($this->eventList->messages);
		// }
		$eventList = EventList::find($event_id);
		$eventList->location = Input::get('location');
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
		$eventList->description = Input::get('description');
		$eventList->date = date("Y-m-d", strtotime(Input::get('date')));	

		$eventList->save();
		return Redirect::to('aevents');
	}
}