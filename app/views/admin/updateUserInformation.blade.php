@extends('layouts.master')

@section('title')
Update Account Information
@stop

@section('style')
{{ HTML::style('css/custom.css') }}
@stop

@section('content')

{{ Form::model($user, array('route' => array('updateUserInfo', $user->id), 'method' => 'PUT')) }}
	<div class='input-group'>
		<span class='input-group-addon'>Username</span>
		{{ Form::text('username', null, array('class'=>'form-control', 'required'=>'required')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Email</span>
		{{ Form::email('email', null, array('class'=>'form-control')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Name</span>
		{{ Form::text('name', null, array('placeholder'=>'Full Name', 'class'=>'form-control')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>Phone Number</span>
		{{ Form::text('phoneNo', null, array('class'=>'form-control')) }}
	</div>
	<div class='input-group'>
		<span class='input-group-addon'>User Type</span>
		{{ Form::select('userType', array('Volunteer', 'Administrator'), $user->user_type, array('class'=>'form-control', 'required'=>'required')) }}
	</div>
	{{ Form::submit('Update Information', array('class'=>'btn btn-primary form-control')) }}
{{ Form::close() }}
@stop