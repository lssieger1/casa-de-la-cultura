<?php

class EventsController extends BaseController{
	protected $eventList;

	public function __construct(EventList $eventList){
		$this->eventList = $eventList;
	}

	public function index(){
		$eventLists = EventList::where('date', '>=', new DateTime('today'))->get();
		return View::make('public/events',['eventLists'=> $eventLists]);
	}
	public function showPastEvents(){
		$eventLists = EventList::where('date', '<', new DateTime('today'))->get();
		return View::make('public/events',['eventLists'=> $eventLists]);
	}
	public function showAdminEvents(){
		$eventLists = $this->eventList->all();
		return View::make('admin/events',['eventLists'=> $eventLists]);
	}
	public function show(){
		return View::make('events');
	}

	public function store(){
		
		$input = Input::all();
		if( ! $this->eventList->fill($input)->isValid() ){
			return Redirect::back()->withErrors($this->eventList->messages);
		}
		
		
		$eventList = new EventList;
		$eventList->location = Input::get('location');
		$type_id = Input::get('eventType') ;
		$eventList->type_id = $type_id;
		$eventList->name = DB::table('eventtype')->where('type_id', $type_id)->pluck('type_name');
		$eventList->description = Input::get('description');
		$eventList->date = Input::get('date');	
	
		$eventList->save();
		return Redirect::to('/events')->with('message', 'Event created');
	}

	public function destroy(){
		$event_id = Input::get('delete');
		$eventList = EventList::find($event_id);
		$eventList->delete();
	}
}