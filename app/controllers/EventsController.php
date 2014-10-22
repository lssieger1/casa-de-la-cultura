<?php

class EventsController extends BaseController{
	protected $eventN;

	public function __construct(EventN $eventN){
		$this->eventN = $eventN;
	}

	public function show(){
		return View::make('events');
	}

	public function create(){
		return View::make('admin.create');
	}

	public function store(){
		
		$input = Input::all();
		if( ! $this->eventN->fill($input)->isValid() ){
			return Redirect::back()->withErrors($this->eventN->messages);
		}
		
		
		$eventN = new EventN;
		$eventN->name = Input::get('name');
		$eventN->description = Input::get('description');
		$eventN->date = Input::get('date');
		$eventN->type_id = Input::get('eventType');
		$eventN->save();
		
			return 'Event created';
		}
	}
