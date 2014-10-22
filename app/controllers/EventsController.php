<?php

class EventsController extends BaseController{
	protected $eventN;

	public function __construct(EventN $eventN){
		$this->eventN = $eventN;
	}

	public function index(){
		$eventNs = $this->eventN->all();
		return View::make('public/events',['eventNs'=> $eventNs]);
	}
	public function show(){
		return View::make('events');
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
		//$eventN->type_id = DB::table('eventtype')->where('type_name', $typeName)->pluck('type_id');

		$eventN->save();
		
			return 'Created';
		}
	}
