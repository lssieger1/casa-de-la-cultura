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
	if (Auth::check() && Auth::user()->user_type == 1)
	{
		return Redirect::to('aevents');
	}
	return Redirect::to('events');
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
			'uses' => 'ParticipantsController@show'
		)
	);

	Route::get('changePassword', function() {
		return View::make('volunteer/changePassword');
	});

	Route::post('changePassword', array(
			'as' => 'change_password',
			'uses' => 'UsersController@changePassword') 
	);

	//check attendance
	Route::get('/showAttendance/{event_id}', 'AttendanceController@show');

	Route::resource('attendance', 'ParticipantsController');

	Route::post('/takeAttendance', 'AttendanceController@store');

	// browse all participants
	Route::get('attendance/browseAllParticipants/{event_id}','ParticipantsController@index');
	Route::post('attendance/browseAllParticipants/{event_id}', array(
						'as' => 'browseAllPart',
						'uses' => 'ParticipantsController@browseAll'
					)
	);

	//sign out
	Route::get('signout', 'SessionsController@destroy');

	//admin 
	Route::group(array('before' => 'admin'), function() {
		//admin main page
		Route::get('aevents', 'EventsController@showAdminEvents');
		Route::get('pastAevents', 'EventsController@showPastAdminEvents');
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

		Route::get('/resetPassword/{id}', array(
			'as' => 'resetpword', function($id){
				return View::make('admin/resetPassword')->with('user', User::findOrFail($id));
			}
		));

		Route::put('/resetPassword/{user}', array(
			'as' => 'reset_pass',
			'uses' => 'UsersController@resetPassword'
			));

		Route::get('/browseAllUsers', 'UsersController@index');

		Route::get('/updateUserInformation/{id}', array(
			'as' => 'updateUserInfo', function($id) {
				return View::make('admin/updateUserInformation')->with('user', User::findOrFail($id));
			}
		));

		Route::put('/updateUserInformation/{user}', array(
			'as' => 'updateUserInfo',
			'uses' => 'UsersController@updateUser'
			)
		);

		Route::resource('admin', 'EventsController');


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

		Route::get('/newUser', function(){
			return View::make('admin/newUser');
		});

		Route::post('/newUser', array(
						'as' => 'user-created',
						'uses' => 'UsersController@store'
					)
		);
	});
});