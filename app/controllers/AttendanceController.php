<?php

class AttendanceController extends BaseController{
	protected $attendance;

	public function __construct(Attendance $attendance){
		$this->attendance = $attendance;
	}
	public function show($event_id){
        $attendances = Attendance::with('Participant')->where('event_id','=',$event_id)->get();
        $eventList = EventList::with('EventType')->find($event_id);
        return View::make('admin/showAttendance',['attendances'=> $attendances,'event'=>$eventList]);
	}

	public function store(){
		$attendance = new Attendance;
		$event_id = Input::get('event_id');
		$attendance->event_id = $event_id;
		$part_id = Input::get('part_id');
		$attendance->part_id = $part_id;
		$type_id = EventList::find($event_id)->first()->type_id;
		$attendance->type_id = $type_id;
		$attendance->save();
		return Redirect::back()->with('message', 'Attendance taken');
	}

	public function destroy(){
		$event_id = Input::get('event_id');
		$part_id = Input::get('part_id');
		DB::table('attendance')->where('event_id','=',$event_id)
							   ->where('part_id','=',$part_id)
			 				   ->delete();

		return Redirect::back();
	}
}