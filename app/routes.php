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
Route::resource('sessions', 'SessionsController');


// Authenticated group
Route::group(array('before' => 'auth'), function() {
//volunteer
Route::post('register',
			array(
				'as' => 'participants-created',
				'uses' => 'ParticipantsController@store'
			)
		);
Route::post('attendance','ParticipantsController@show');
Route::get('register', function(){
	return View::make('volunteer/register');
});
//take attendance
Route::post('/takeAttendance', 'AttendanceController@store');
//sign out
Route::get('signout', 'SessionsController@destroy');

//admin 
Route::group(array('before' => 'admin'), function() {


//admin main page
Route::get('aevents', 'EventsController@showAdminEvents');
//admin create event
Route::post('public/events',
			array(
				'as' => 'events-created',
				'uses' => 'EventsController@store'
			)
		);
Route::get('/check', 'UsersController@show');
//admin edit event
Route::get('admin/edit',
			array(
				'as' => 'part-edited',
				'uses' => 'EventsController@edit'
			)
		);
//admin delete event
Route::post('/delete', 'EventsController@destroy');
});

//admin check attendance
Route::get('/showAttendance', 'AttendanceController@show');
});




Route::get('/query',function() {
	$user = DB::table('eventtype')->where('type_name', 'swimming')->pluck('type_id');
		print $user;

});


