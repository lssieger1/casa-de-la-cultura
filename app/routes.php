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
//public

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/events','EventsController@index');
Route::get('/pastEvents','EventsController@showPastEvents');
Route::get('signin', 'SessionsController@create');



// Authenticated group




//volunteer
Route::resource('sessions', 'SessionsController');
Route::get('attendance','ParticipantsController@show');
Route::post('public/events',
			array(
				'as' => 'participants-created',
				'uses' => 'ParticipantsController@store'
			)
		);
Route::get('register', function(){
	return View::make('volunteer/register');
});

Route::group(array('before' => 'auth|role'), function() {
Route::get('signout', 'SessionsController@destroy');
//admin
Route::get('aevents', 'EventsController@showAdminEvents');
Route::post('public/events',
			array(
				'as' => 'events-created',
				'uses' => 'EventsController@store'
			)
		);
Route::get('/check', 'UsersController@show');
});


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

//testtttt
Route::post('admin/edit',
			array(
				'as' => 'part-edited',
				'uses' => 'EventsController@edit'
			)
		);
