@extends('layouts.master')

@section('title')
Create New User
@stop

@section('content')
{{ Form::open() }}
	<div>
		{{ Form::label('username', 'Username: ') }}
		{{ Form::text('username') }}
	</div>
	<div>
		{{ Form::label('email', 'Email: ') }}
		{{ Form::email('email') }}
	</div>
	<div>
		{{ Form::label('name', 'Name: ') }}
		{{ Form::text('name') }}
	</div>
	<div>
		{{ Form::label('password', 'Password: ') }}
		{{ Form::text('password') }}
	</div>
	<div>
		{{ Form::label('verifyPassword', 'Verify Password: ') }}
		{{ Form::text('verifyPassword') }}
	</div>
	<div>
		{{ Form::label('phoneNumber', 'Phone Number: ') }}
		{{ Form::text('phoneNumber') }}
	</div>
	<div>
		{{ Form::label('userType', 'User Type: ') }}
		{{ Form::select('userType', array('Volunteer', 'Administrator')) }}
	</div>

	{{ Form::submit('Create User') }}
{{ Form::close() }}
@stop