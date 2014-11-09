<?php

class AttendanceController extends BaseController{
	protected $attendance;

	public function __construct(Attendance $attendance){
		$this->attendance = $attendance;
	}
	public function show(){
        $attendances = $this->attendance->all();
		return View::make('admin/showAttendance',['attendances'=> $attendances]);
	}

	public function store(){

		$attendance = new Attendance;
		$attendance->event_id = Input::get('event_id');
		$part_id = Input::get('part_id');
		$attendance->part_id = $part_id;

		$attendance->save();
		Session::flash('message','Attendance taken');
		return Redirect::back()->with('message', 'Attendance taken');
	}
}