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

Route::get('/events', function()
{
	return View::make('public/events');
});

Route::get('/signin', function() {
	return View::make('public/signin');
});

Route::get('/create', function() {
	return View::make('admin/create');
});

Route::get('/query',function() {
	$user = DB::table('users')->where('username', 'billybob')->first();

	var_dump($user->username);

	$event = DB::table('eventtype')->where('type_id', 1)->first();

	var_dump($event->type_name);

	$roles = DB::table('eventtype')->lists('type_name');
	var_dump($roles);

	//select all pariticipants who attend event 1
	$parts = DB::table('attendance')
            ->join('participants', 'attendance.part_id', '=', 'participants.part_id')
            ->join('events', 'attendance.event_id', '=', 'events.event_id')
            -> where('events.event_id','=',1)
            ->select('events.description', 'participants.fname', 'participants.lname')
            ->get();
            var_dump($parts);
});