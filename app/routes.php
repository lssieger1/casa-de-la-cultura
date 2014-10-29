<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/events','EventsController@index');
Route::get('/pastEvents','EventsController@showPastEvents');
/*-- Route::get('/signin', function() {
	return View::make('public/signin');
}); */

Route::get('signin', 'SessionsController@create');

Route::get('signout', 'SessionsController@destroy');
Route::get('attendance',function(){
	return View::make('volunteer.attendance');
});

// Route::get('/edit', function() {
// 	return View::make('admin/edit');
// });

Route::get('aevents', function() {
	return View::make('admin/events');
});

Route::get('/check', 'UsersController@show');//function() //{
	// if(Auth::check()){
	// return View::make('volunteer/attendance');
	// }
//

Route::resource('sessions', 'SessionsController');



Route::get('/query',function() {
	$user = DB::table('eventtype')->where('type_name', 'swimming')->pluck('type_id');
		print $user;

	//select all pariticipants who attend event 1
	// $parts = DB::table('attendance')
 //            ->join('participants', 'attendance.part_id', '=', 'participants.part_id')
 //            ->join('events', 'attendance.event_id', '=', 'events.event_id')
 //            -> where('events.event_id','=',1)
 //            ->select('events.description', 'participants.fname', 'participants.lname')
 //            ->get();
 //            var_dump($parts);
});

Route::post('public/events',
			array(
				'as' => 'events-created',
				'uses' => 'EventsController@store'
			)
		);
