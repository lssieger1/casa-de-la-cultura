<?php

class EventsController extends BaseController{
	protected $eventN;

	public function __construct(Event $eventN){
		$this->eventN = $eventN;
	}

	public function show(){
		return View::make('events');
	}

	public function create(){
		return View::make('admin.create');
	}

	public function store(){
		$validation = Validator::make(Input::all(),EventN::$rules);
		if($validation->fails()){
			return Redirect::back()->withErrors($validation->messages());
		}

		// $valid = Validator::make(Input::all(),
		// 	array(
		// 		'name' => 'required|max:50',
		// 		'description' => 'required',
		// 		'date' => 'required|date',
		// 	)
		// );



		// if($valid->fails()) {
		// 	return 'Name, description and date cannot be blank';
		// }
		
		$eventN = new EventN;
		$eventN->name = Input::get('name');
		$eventN->description = Input::get('description');
		$eventN->date = Input::get('date');
		$eventN->save();
		
			return 'Event created';
		}
	}
