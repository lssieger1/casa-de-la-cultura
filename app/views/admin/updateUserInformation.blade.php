@extends('layouts.master')

@section('title')
Update Account Information
@stop

@section('style')
{{ HTML::style('css/custom.css') }}
@stop

@section('content')

{{ Form::model($user, array('route' => array('updateUserInfo', $user->id), 'method' => 'PUT')) }}
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
		{{ Form::label('phoneNo', 'Phone Number: ', array('class'=>'form-control')) }}
		{{ Form::text('phoneNo', null, array('class'=>'form-control')) }}
	</div>
	<div>
		{{ Form::label('userType', 'User Type: ', array('class'=>'form-control')) }}
		{{ Form::select('userType', array('Volunteer', 'Administrator'), $user->user_type, array('class'=>'form-control')) }}
	</div>
	{{ Form::submit('Update Information', array('class'=>'btn btn-primary form-control')) }}
{{ Form::close() }}
@stop