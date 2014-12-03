@extends('layouts.master')

@section('title')
Create New User
@stop

@section('style')
{{ HTML::style('css/custom.css') }}
@stop

@section('content')
{{ Form::open() }}
	<div>
		{{ Form::label('username', 'Username: ', array('class'=>'form-control')) }}
		{{ Form::text('username', null, array('class'=>'form-control')) }}
	</div>
	<div>
		{{ Form::label('email', 'Email: ', array('class'=>'form-control')) }}
		{{ Form::email('email', null, array('class'=>'form-control')) }}
	</div>
	<div>
		{{ Form::label('name', 'Name: ', array('class'=>'form-control')) }}
		{{ Form::text('name', null, array('class'=>'form-control')) }}
	</div>
	<div>
		{{ Form::label('password', 'Password: ', array('class'=>'form-control')) }}
		{{ Form::password('password', array('class'=>'form-control', 'required'=>'required')) }}
	</div>
	<div>
		{{ Form::label('verifyPassword', 'Verify Password: ', array('class'=>'form-control')) }}
		{{ Form::password('verifyPassword', array('class'=>'form-control')) }}
	</div>
	<div>
		{{ Form::label('phoneNumber', 'Phone Number: ', array('class'=>'form-control')) }}
		{{ Form::text('phoneNumber', null, array('class'=>'form-control')) }}
	</div>
	<div>
		{{ Form::label('userType', 'User Type: ', array('class'=>'form-control')) }}
		{{ Form::select('userType', array('Volunteer', 'Administrator'), 1, array('class'=>'form-control')) }}
	</div>
	{{ Form::submit('Create User', array('class'=>'btn btn-primary form-control')) }}
{{ Form::close() }}
@stop