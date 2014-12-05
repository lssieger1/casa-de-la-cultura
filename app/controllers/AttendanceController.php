<?php

class AttendanceController extends BaseController{
	protected $attendance;

	public function __construct(Attendance $attendance){
		$this->attendance = $attendance;
	}
	public function show($event_id){
        $attendances = DB::table('attendance')->where('event_id','=',$event_id)
        			 ->join('participants', 'participants.part_id', '=', 'attendance.part_id')
           			 ->select('fname', 'lname','dob','phoneNo','address')
            		 ->get();

        return View::make('admin/showAttendance',['attendances'=> $attendances]);
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
		Session::flash('message','Attendance taken');
		return Redirect::back()->with('message', 'Attendance taken');
	}
}