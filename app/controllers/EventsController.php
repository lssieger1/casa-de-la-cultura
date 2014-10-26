<?php

class EventsController extends BaseController{
	protected $eventList;

	public function __construct(EventList $eventList){
		$this->eventList = $eventList;
	}

	public function index(){
		$eventLists = $this->eventList->all();
		//check if the date is past or not

		return View::make('public/events',['eventLists'=> $eventLists]);
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
		$type_id = Input::get('eventType') +1;
		$eventList->type_id = $type_id;
		$eventList->name = DB::table('eventtype')->where('type_id', $type_id)->pluck('type_name');
		$eventList->description = Input::get('description');
		$eventList->date = Input::get('date');	
	
		$eventList->save();
		
			return View::make('/events');
		}
	}
