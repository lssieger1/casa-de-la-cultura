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

	Route::get('attendance/{event_id}', 
		array(
			'as' => 'takingAttendance',
			'uses' => 'ParticipantsController@show' )
	);

	
	//take attendance
	Route::post('/takeAttendance', 'AttendanceController@store');

	//check attendance
	Route::get('/showAttendance/{event_id}', 'AttendanceController@show');

	// browse all participants
	Route::get('/browseAllParticipants', function() {
		return View::make('volunteer/browseAllParticipants');
	});

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
		Route::get('edit/{event_id}',
					array(
						'as' => 'event-tobe-edited',
						'uses' => 'EventsController@edit'	
					)
				);

		Route::resource('admin', 'EventsController');
		//admin delete event
		Route::post('/delete', 'EventsController@destroy');

		//admin queries
		Route::get('/query', function() {
			return View::make('admin/query');
		});

		Route::post('/runQuery',
					array(
						'as' => 'runQuery',
						'uses' => 'UsersController@runQuery'	
					)
		);

		Route::get('/newUser', function() {
			return View::make('admin/newUser');
		});
	});
});