@extends('layouts.master')

@section('title')
Create New User
@stop

@section('style')
{{ HTML::style('css/custom.css') }}
@stop

@section('content')
{{ Form::open(['user-created']) }}
	<div class='input-group'>
		<span class='input-group-addon'>Username</span>
		{{ Form::text('username', null, array('class'=>'form-control')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Email</span>
		{{ Form::email('email', null, array('class'=>'form-control')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Name</span>
		{{ Form::text('name', null, array('class'=>'form-control')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Password</span>
		{{ Form::password('password', array('class'=>'form-control', 'required'=>'required')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Verify Password</span>
		{{ Form::password('verifyPassword', array('class'=>'form-control')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Phone Number</span>
		{{ Form::text('phoneNo', null, array('class'=>'form-control')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Account Type</span>
		{{ Form::select('userType', array('Administrator', 'Volunteer'), 1, array('class'=>'form-control')) }}
	</div>
	{{ Form::submit('Create User', array('class'=>'btn btn-primary form-control')) }}
{{ Form::close() }}
@stop