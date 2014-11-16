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
//>>
Route::get('attendance/{event_id}', 
	array(
		'as' => 'takingAttendance',
		'uses' => 'ParticipantsController@show' )
);


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

Route::post('admin/edit',
// Route::get('admin/edit/{id}',
			array(
				'as' => 'event-edited',
				'uses' => 'EventsController@edit'
		
			)
		);

Route::resource('admin', 'EventsController');
//admin delete event
Route::post('/delete', 'EventsController@destroy');
});

//admin check attendance
Route::get('/showAttendance', 'AttendanceController@show');
});





